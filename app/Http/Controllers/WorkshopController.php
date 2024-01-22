<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PendaftaranWorkshop;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    public function index(Request $request) {
        // $workshops = Workshop::with(['pendaftaran_workshop.user'])->get();
        // $pendaftaran = PendaftaranWorkshop::with(['workshop'])->findOrFail(Auth::user()->id);
        $keyword = $request->keyword;
        if ($keyword) {
            $workshops = Workshop::where('title', 'LIKE', '%'.$keyword.'%')->paginate(15);
        } else {
            $workshops = Workshop::with('pendaftaran_workshop')->paginate(15);
        }

        return view('dashboard.workshop.index', [
            'workshops' => $workshops,
            // 'pendaftaran' => $pendaftaran
        ]);
    }

    public function detail($id) {
        $workshop = Workshop::findOrFail($id);
        $excerpt = Str::limit(strip_tags($workshop->content, 100));

        return view('dashboard.workshop.detail', [
            'workshop' => $workshop,
            'excerpt' => $excerpt,
        ]);
    }

    public function create() {
        return view('dashboard.workshop.add');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required'
        ]);

        Workshop::create($request->all());

        return redirect('/dashboard/workshops/'. Auth::user()->id)->with('success', 'Add workshop has success!');
    }

    public function daftar($id) {
        $workshop = Workshop::findOrFail($id);
        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'workshop_id' => $workshop->id
        ];

        PendaftaranWorkshop::create($data);

        return redirect('/dashboard/workshops/'. Auth::user()->id)->with('success', 'Daftar workshop success!');

    }

    public function belajar($id) {
        $workshops = PendaftaranWorkshop::with(['workshop'])->where('user_id', $id)->get();
        return view('dashboard.workshop.belajar', [
            'workshops' => $workshops,
        ]);
    }

    public function detailBelajar($id) {
        $workshop = Workshop::findOrFail($id);
        return view('dashboard.workshop.detail-belajar', [
            'workshop' => $workshop,
        ]);
    }

    public function destroy($id) {
        $workshop = Workshop::findOrFail($id);
        Workshop::destroy($workshop->id);
        return redirect('/dashboard/workshops/'. Auth::user()->id)->with('success', 'Delete Workshop success');
    }

}
