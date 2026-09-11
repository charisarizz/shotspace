<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvent = Event::count();
        $totalShotties = Pendaftaran::count();
        $pendaftarHariIni = Pendaftaran::whereDate('created_at', Carbon::today())->count();

        $pendaftarTerbaru = Pendaftaran::with('event')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('totalEvent', 'totalShotties', 'pendaftarHariIni', 'pendaftarTerbaru'));
    }
}
