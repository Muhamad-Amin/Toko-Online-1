<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard($id) {
        $user = User::with(['role'])->findOrFail($id);
        return view('dashboard.index', [
            'user' => $user,
        ]);
    }

    public function profile($id) {
        $user = User::findOrFail($id);
        return view('dashboard.profile', [
            'user' => $user,
        ]);
    }

    public function users($id) {
        $user = User::findOrFail($id);

        if ($user->role_id != 1) {
            return redirect('/');
        }

        return view('dashboard.users', [
            'users' => User::where('role_id', '!=', 1 )->get(),
        ]);
    }

    public function userDestroy($id) {
        $user = User::findOrFail($id);

        if (Auth::user()->role_id == 1) {
            if ($user->image) {
                $image_path = public_path('storage/photo'. $user->image);
                if (file_exists(($image_path))) {
                    unlink($image_path);
                }
            }

            $user->delete();

            return redirect('dashboard/users/1')->with('success', 'Deleted users has success!');
        } else {
            return redirect('/');
        }



    }

}
