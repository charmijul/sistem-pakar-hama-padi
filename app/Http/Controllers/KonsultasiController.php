<?php

namespace App\Http\Controllers;

use App\Models\Hama;
use App\Models\Gejala;
use Illuminate\Http\Request;
use App\Models\Basis_Pengetahuan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class KonsultasiController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('konsultasi', [
            "gejala" => $gejala
        ]);
    }

    public function proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gejala' => 'required|array|min:2' // Memastikan input "gejala" harus berupa array
        ]);
    
        if ($validator->fails()) {
            // Validasi gagal, lakukan penanganan kesalahan di sini
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        // dd($request);
        $gejala = collect(request()->input('gejala'));
        $m = Gejala::count();
        $n = 1;
        $o = Hama::count();
        $p = $n / $o;
        $Nc = [];
        $Pc = [];
        $v = new Collection();
        $inputGejala = new Collection();

        $hamaGejalaCollection = Basis_Pengetahuan::with('hama', 'gejala')
            ->get()
            ->groupBy('id_hama')
            ->map(function ($basisPengetahuan) {
                $hama = $basisPengetahuan->first()->hama;
                $gejala = $basisPengetahuan->pluck('gejala.id')->toArray();

                return [
                    'id_hama' => $hama->id,
                    'id_gejala' => $gejala,
                ];
            });

        //menentukan nilai NC setiap class
        foreach ($hamaGejalaCollection as $item) {
            $gejalaHama = $item['id_gejala'];
            $idHama = $item['id_hama'];

            $nilaiGejala = $gejala->map(function ($gejala) use ($gejalaHama) {
                return in_array($gejala, $gejalaHama) ? 1 : 0;
            })->toArray();

            $Nc[] = [
                'id_hama' => $idHama,
                'nc_gejala' => $nilaiGejala,
            ];
        }

        //menghitung nilai p(ai|vj) dan menghitung nilai p(vj)
        foreach ($Nc as $data) {
            $idHama = $data['id_hama'];
            $nilaiGejala = $data['nc_gejala'];

            $nilaiGejalaBaru = collect($nilaiGejala)->map(function ($nilai) use ($m, $p, $n) {
                return ($nilai + $m * $p) / ($n + $m);
            });

            $Pc[] = [
                'id_hama' => $idHama,
                'pc_gejala' => $nilaiGejalaBaru->toArray(),
            ];
        }

        //menghitung p(ai|vj) * p(vj) untuk setiap v
        foreach ($Pc as $data) {
            $idHama = $data['id_hama'];
            $nilaiGejala = $data['pc_gejala'];

            $namaHama = Hama::find($idHama)->name; // Mendapatkan nama hama berdasarkan id

            $hasilPerkalian = array_reduce($nilaiGejala, function ($carry, $nilai) {
                return $carry * $nilai;
            }, 1);

            $v->push([
                'nama_hama' => $namaHama,
                'v_gejala' => $hasilPerkalian * $p,
            ]);
        }

        //mengurutkan hama berdasarkan nilai v nya
        $v = $v->sortByDesc('v_gejala');

        foreach ($gejala as $g) {
            $symptom = Gejala::find($g)->symptom;

            $inputGejala->push([
                'id_gejala' => $g,
                'gejala' => $symptom
            ]);
        }

        return view('hasil_diagnosa', [
            'inputGejala' => $inputGejala,
            'v' => $v
        ]);
        // dd($m, $n, $o, $p, $hamaGejalaCollection, $gejala, $Nc, $Pc, $v);
    }
}
