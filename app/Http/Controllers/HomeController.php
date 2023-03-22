<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $countA = Mahasiswa::where('grade', 'A')->count();
        $countB = Mahasiswa::where('grade', 'B')->count();
        $countC = Mahasiswa::where('grade', 'C')->count();
        $countD = Mahasiswa::where('grade', 'D')->count();

        return view('home.index', [
            'mahasiswa' => $mahasiswa,
            'countA' => $countA,
            'countB' => $countB,
            'countC' => $countC,
            'countD' => $countD,
        ]);
    }
}
