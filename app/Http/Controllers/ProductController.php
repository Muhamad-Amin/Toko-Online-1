<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{

    public function index(Request $requst,$id) {
        $keyword = $requst->keyword;
        $user = User::with(['product'])->findOrFail($id);

        if ($keyword == '' || $keyword == 'All') {
            if ($user->role_id === 2) {
                $products = Product::latest()->with(['user', 'categori'])->where('user_id', $user->id)->paginate(16);
            } else {
                $products = Product::latest()->with(['user', 'categori'])->paginate(16);
            }
        } else {
            if ($user->role_id === 2) {
                $products = Product::with(['categori'])->where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
                            ->where('user_id', $user->id)
                            ->orWhereHas('categori', function($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })->paginate(16);
            } else {
                $products = Product::with(['categori', 'user'])->where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
                            ->orWhereHas('user', function($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })
                            ->orWhereHas('categori', function($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })->paginate(16);
            }
        }

        return view('dashboard.product.index', [
            'products' => $products,
        ]);
    }

    public function detail($id) {
        $product = Product::with(['user'])->findOrFail($id);
        return view('dashboard.product.detail', [
            'product' => $product,
        ]);
    }

    public function create () {
        $categories = Categori::all();
        return view('dashboard.product.add', [
            'categories' => $categories,
        ]);
    }

    public function store(ProductCreateRequest $request) {

        $validateData = $request->validate([
            'categori_id' => 'required|numeric',
            'name' => 'required|max:255',
            'harga' => 'required|min:3|numeric',
            'foto' => 'image|file|mimes:png,jpg,jpeg,gif,svg|max:11024',
        ]);

        $newName = null;
        if($request->file('foto')) {
            $ekstension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('foto')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $request['user_id'] = auth()->user()->id;

        Product::create($request->all());

        return redirect('/dashboard/products/'.Auth::user()->id)->with('success', 'New Product has added!');
    }

    public function edit($id) {
        $product = Product::with(['categori'])->findOrFail($id);
        $categories = Categori::where('id', '!=', $product->categori->id)->get();
        return view('dashboard.product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'categori_id' => 'required|numeric',
            'name' => 'required|max:255',
            'harga' => 'required|min:3|numeric',
            'foto' => 'image|file|mimes:png,jpg,jpeg,gif,svg|max:11024',
        ]);

        if ($request->file('foto')) {
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
        $request['user_id'] = Auth::user()->id;

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('dashboard/products/'. Auth::user()->id)->with('success', 'Update product has success!');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        if($product->image) {
            $image_path = public_path('storage/photo/'.$product->image);
            if(file_exists($image_path)) {
                unlink($image_path);
            }
        }

        Product::destroy($product->id);
        return redirect('/dashboard/products/'.Auth::user()->id)->with('success', 'Deleted product has success!');
    }

}
