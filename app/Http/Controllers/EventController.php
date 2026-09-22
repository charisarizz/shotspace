<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function indexFans()
    {
        $events = Event::latest()->get();
        return view('fans.index', compact('events'));
    }

    public function showFans($id)
    {
        $event = Event::findOrFail($id);
        return view('fans.detail', compact('event'));
    }

    public function indexAdmin()
    {
        $events = Event::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string',
            'kuota' => 'required|integer|min:1',
        ]);

        Event::create($request->all());

        return redirect()->back()->with('success', 'Event berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string',
            'kuota' => 'required|integer',
        ]);

        $event->update($request->all());

        return redirect()->back()->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->back()->with('success', 'Event berhasil dihapus!');
    }
}
