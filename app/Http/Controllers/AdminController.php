<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = Admin::latest()->get();
        return view('admin.kelola_admin.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.kelola_admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $adminId = decrypt($id);

        if ($adminId == session('admin_id')) {
            return redirect()->back()->with('error', 'Kamu tidak dapat menghapus akunmu sendiri!');
        }

        $admin = Admin::findOrFail($adminId);
        $admin->delete();

        return redirect()->route('admin.kelola_admin.index')->with('success', 'Data admin berhasil dihapus!');
    }
}
