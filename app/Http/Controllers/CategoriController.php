<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoriCreateRequest;

class CategoriController extends Controller
{
    public function index(Request $request,$id) {
        $keyword = $request->keyword;
        if ($keyword) {
            $categories = Categori::where('name', 'LIKE', '%'.$keyword.'%')->paginate();
        } else {
            $categories = Categori::latest()->paginate(15);
        }

        $user = User::findOrFail($id);

        if ($user->role_id != 1) {
            return redirect('/dashboard/'.$user->id);
        }

        return view('dashboard.categori.index', [
            'categories' => $categories,
        ]);
    }

    public function detail($id) {
        $categori = Categori::with(['product.user'])->findOrFail($id);
        return view('dashboard.categori.detail', [
            'categori' => $categori,
        ]);
    }

    public function create() {
        return view('dashboard.categori.add');
    }

    public function store(CategoriCreateRequest $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'foto' => 'image|file|mimes:png,jpg,jpeg,gif,svg|max:11024'
        ]);

        $newName = null;
        if ($request->file('foto')) {
            $ekstension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('foto')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;

        Categori::create($request->all());

        return redirect('dashboard/categories/1')->with('success', 'New categori has added!');
    }

    public function edit($id) {
        $categori = Categori::findOrFail($id);
        return view('dashboard.categori.edit', [
            'categori' => $categori,
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|mimes:png,jpg,jpeg,gif,svg|max:11024'
        ]);

        if($request->file('foto')) {
            if ($request->oldImage != null) {
                $image_path = public_path('storage/photo/'.$request->oldImage);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $ekstension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('foto')->storeAs('photo', $newName);
        } else {
            $newName = $request->oldImage;
        }

        $request['image'] = $newName;

        $categori = Categori::findOrFail($id);
        $categori->update($request->all());

        return redirect('dashboard/categories/1')->with('success', 'Update categori has success!');
    }

    public function destroy($id) {
        $categori = Categori::findOrFail($id);

        if ($categori->image) {
            $image_path = public_path('storage/photo/'.$categori->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        Categori::destroy($categori->id);

        return redirect('/dashboard/categories/1')->with('success', 'Deleted categori has success!');
    }

}
