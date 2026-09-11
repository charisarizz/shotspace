<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Admin::findOrFail(session('admin_id'));
        return view('admin.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $admin = Admin::findOrFail(session('admin_id'));

        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6',
        ]);

        $admin->nama = $request->nama;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        session(['admin_nama' => $admin->nama]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}