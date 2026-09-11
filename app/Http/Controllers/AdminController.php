<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.kelola_admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Admin baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        if ($id == session('admin_id')) {
            return redirect()->back()->with('error', 'Kamu tidak bisa menghapus akunmu sendiri!');
        }

        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Data admin berhasil dihapus!');
    }
}