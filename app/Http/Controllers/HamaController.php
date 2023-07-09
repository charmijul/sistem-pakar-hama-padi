<?php

namespace App\Http\Controllers;

use App\Models\Hama;
use Illuminate\Http\Request;

class HamaController extends Controller
{
    public function index(){
        $hama = Hama::all();
        return view('hama', [
            "hama" => $hama
        ]);
    }
}
