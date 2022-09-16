<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AsistenController extends Controller
{
    public function index()
    {
        $asisten = User::where('roles', 'asisten')->paginate(7);

        return view('pages.asisten.index', [
            'asisten' => $asisten
        ]);
    }

    public function create()
    {
        return view('pages.asisten.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $data['roles'] = 'asisten';
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('asisten')->with([
            'status' => 'sukses',
            'message' => 'Asisten Berhasil Dibuat'
        ]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('pages.asisten.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $item = User::findOrFail($id);

        $item->update($data);

        return redirect()->route('asisten')->with([
            'status' => 'sukses',
            'message' => 'Asisten Berhasil Diubah'
        ]);
    }

    public function destroy($id)
    {

        $item = User::findOrFail($id);

        $item->delete();

        return redirect()->route('asisten')->with([
            'status' => 'sukses',
            'message' => 'Asisten Berhasil Dihapus'
        ]);
    }
}
