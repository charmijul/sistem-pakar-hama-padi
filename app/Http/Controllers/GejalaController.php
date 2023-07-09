<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index(){
        $gejala = Gejala::all();
        return view('gejala', [
            "gejala" => $gejala
        ]);
    }
}
