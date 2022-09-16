<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use App\Models\Presensi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
    {
        $bap = Berita_acara::with('presensis')->paginate(7);
        return view('pages.absen.index', [
            'bap' => $bap
        ]);
    }

    public function create($id)
    {
        $item = Berita_acara::findOrFail($id);
        return view('pages.absen.create', [
            'item' => $item
        ]);
    }

    public function store(Request $request, $id)
    {

        $data = $request->validate([
            'jobdesc' => 'required|max:20',
            'status' => 'required|in:hadir,izin,sakit',
        ]);

        $bap = Berita_acara::findOrFail($id);

        $item = Presensi::create([
            'user_id' => Auth::user()->id,
            'berita_acara_id' => $bap->id,
            'jobdesc' => $data['jobdesc'],
            'status' => $data['status']
        ]);

        return redirect()->route('presensi')->with([
            'status' => 'sukses',
            'message' => 'Presensi Berhasil Dilakukan'
        ]);
    }
}
