<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $asisten = User::where('roles', 'asisten')->count();
        $bap = Berita_acara::count();
        $presensi = Presensi::count();
        return view('pages.dashboard.index', [
            'asisten' => $asisten,
            'bap' => $bap,
            'presensi' => $presensi
        ]);
    }
}
