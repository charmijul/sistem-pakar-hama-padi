<?php

namespace App\Http\Controllers;

use App\Models\Hama;
use App\Models\Gejala;
use App\Models\Basis_Pengetahuan;
use Illuminate\Http\Request;

class KelolaGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejalaList = Gejala::all();

        return view('gejala.index', [
            "gejalaList" => $gejalaList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hamaList = Hama::all();
        return view('gejala.create', compact('hamaList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gejala = new Gejala();
        $gejala->symptom = $request->input('symptom');
        $gejala->save();

        $hamaIds = $request->input('hama');
        foreach ($hamaIds as $hamaId) {
            $basisPengetahuan = new Basis_Pengetahuan();
            $basisPengetahuan->id_hama = $hamaId;
            $basisPengetahuan->id_gejala = $gejala->id;
            $basisPengetahuan->save();
        }

        return redirect()->route('kelola-gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);

        return view('gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gejala = Gejala::findOrFail($id);

        $gejala->symptom = $request->input('symptom');
        $gejala->save();

        return redirect()->route('kelola-gejala.index')->with('success', 'Data gejala berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);

        // Menghapus data pada tabel basis_pengetahuan yang menggunakan gejala yang dihapus
        $gejala->basis_pengetahuan()->delete();

        // Menghapus data gejala
        $gejala->delete();

        return redirect()->route('kelola-gejala.index')->with('success', 'Data gejala berhasil dihapus.');
    
    }
}
