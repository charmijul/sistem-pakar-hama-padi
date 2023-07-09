<?php

namespace App\Http\Controllers;

use App\Models\Hama;
use App\Models\Basis_Pengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelolaHamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hamaList = Hama::all();

        return view('hama.index', compact('hamaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required',
            'scientific_name' => 'required',
            'description' => 'required',
            'solution' => 'required',
            'image' => 'required|image|max:2048',
            // Tambahkan validasi untuk input field lainnya sesuai kebutuhan
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('images');

        // Simpan data hama ke database
        $hama = new Hama();
        $hama->name = $validatedData['name'];
        $hama->scientific_name = $validatedData['scientific_name'];
        $hama->description = $validatedData['description'];
        $hama->solution = $validatedData['solution'];
        $hama->image = $imagePath;
        // Setel nilai atribut lainnya sesuai kebutuhan
        $hama->save();

        // Redirect ke halaman index hama dengan pesan sukses
        return redirect()->route('kelola-hama.index')->with('success', 'Data hama berhasil ditambahkan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Hama $hama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hama = Hama::findOrFail($id);

        return view('hama.edit', compact('hama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required',
            'scientific_name' => 'required',
            'description' => 'required',
            'solution' => 'required',
            'image' => 'image|max:2048',
            // Tambahkan validasi untuk input field lainnya sesuai kebutuhan
        ]);

        // Cari data hama berdasarkan ID
        $hama = Hama::findOrFail($id);

        // Update data hama
        $hama->name = $validatedData['name'];
        $hama->scientific_name = $validatedData['scientific_name'];
        $hama->description = $validatedData['description'];
        $hama->solution = $validatedData['solution'];

        // Update gambar jika ada perubahan
        if ($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $imagePath = $request->file('image')->store('images');
            $hama->image = $imagePath;
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hama_images', 'public');
            $hama->image = $imagePath;
        }

        // Simpan perubahan pada data hama
        $hama->save();

        return redirect()->route('kelola-hama.index')->with('success', 'Data hama berhasil diperbarui');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data hama berdasarkan ID
        $hama = Hama::findOrFail($id);

        // Cek penggunaan data hama pada tabel basis_pengetahuan
        $basisPengetahuan = Basis_Pengetahuan::where('id_hama', $hama->id)->exists();

        // Jika data hama digunakan pada tabel basis_pengetahuan, hapus juga data pada tabel basis_pengetahuan
        if ($basisPengetahuan) {
            Basis_Pengetahuan::where('id_hama', $hama->id)->delete();
        }

        // Hapus data hama
        $hama->delete();

        // Redirect ke halaman index hama atau halaman lain sesuai kebutuhan
        return redirect()->route('kelola-hama.index')->with('success', 'Data hama berhasil dihapus.');
    
    }
}
