<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Event;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('event')->latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function showForm($id)
    {
        $eventId = decrypt($id);
        $event = Event::findOrFail($eventId);
        return view('fans.pendaftaran', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'no_hp'    => 'required|string|max:20',
            'alamat'   => 'required|string',
        ]);

        $eventId = decrypt($request->event_id);

        Pendaftaran::create([
            'event_id' => $eventId,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
        ]);

        return redirect()->route('fans.index')->with('success', 'Pendaftaran berhasil! Sampai jumpa di event.');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
