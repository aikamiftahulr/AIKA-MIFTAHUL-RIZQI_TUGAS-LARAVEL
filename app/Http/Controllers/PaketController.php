<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('rental', compact('pakets'));
    }

    public function create()
    {
       //return view tambah
       return view('tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'jenis' => 'required',
            'durasi' => 'required|numeric',
            'ketentuan' => 'required',
        ]);

        Paket::create($request->all());

        return redirect()->route('rental.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('ubah', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'jenis' => 'required',
            'durasi' => 'required|numeric',
            'ketentuan' => 'required',
        ]);

        $paket = Paket::findOrFail($id);
        $paket->update($request->all());

        return redirect()->route('rental.index')->with('success', 'Paket berhasil diubah!');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        //$paket delete()
        $paket->delete();

        return redirect()->route('rental.index')->with('success', 'Paket berhasil dihapus!');
    }
}


