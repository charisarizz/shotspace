<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Admin::find(session('admin_id'));

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login kembali.');
        }

        return view('admin.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Admin::findOrFail(session('admin_id'));

        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        session(['admin_nama' => $user->nama]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
