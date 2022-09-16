<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaAcaraController extends Controller
{
    public function index()
    {
        $bap = Berita_acara::paginate(7);
        return view('pages.bap.index', [
            'bap' => $bap
        ]);
    }

    public function create()
    {
        return view('pages.bap.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:30',
            'total_mhs' => 'required|integer',
            'description' => 'required|string|max:150',
        ]);

        $data['user_id'] = Auth::user()->id;
        Berita_acara::create($data);

        return redirect()->route('berita-acara')->with([
            'status' => 'sukses',
            'message' => 'Berita Acara Berhasil Dibuat'
        ]);
    }

    public function edit($id)
    {
        $item = Berita_acara::findOrFail($id);
        return view('pages.bap.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:30',
            'total_mhs' => 'required|integer',
            'description' => 'required|string|max:150',
        ]);

        $item = Berita_acara::findOrFail($id);

        $item->update($data);

        return redirect()->route('berita-acara')->with([
            'status' => 'sukses',
            'message' => 'Berita Acara Berhasil Diubah'
        ]);
    }

    public function destroy($id)
    {

        $item = Berita_acara::findOrFail($id);

        $item->delete();

        return redirect()->route('berita-acara')->with([
            'status' => 'sukses',
            'message' => 'Berita Acara Berhasil Dihapus'
        ]);
    }
}
