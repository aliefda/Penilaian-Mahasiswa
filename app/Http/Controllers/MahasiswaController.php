<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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

        return view('mahasiswa.index', [
            'mahasiswa' => $mahasiswa,
            'countA' => $countA,
            'countB' => $countB,
            'countC' => $countC,
            'countD' => $countD,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->nilai_quis = $request->input('nilai_quis');
        $mahasiswa->nilai_tugas = $request->input('nilai_tugas');
        $mahasiswa->nilai_absensi = $request->input('nilai_absensi');
        $mahasiswa->nilai_praktek = $request->input('nilai_praktek');
        $mahasiswa->nilai_uas = $request->input('nilai_uas');
        $mahasiswa->rata_rata = ($mahasiswa->nilai_quis + $mahasiswa->nilai_tugas + $mahasiswa->nilai_absensi + $mahasiswa->nilai_praktek + $mahasiswa->nilai_uas) / 5;

        if ($mahasiswa->rata_rata <= 65) {
            $mahasiswa->grade = 'D';
        } elseif ($mahasiswa->rata_rata <= 75) {
            $mahasiswa->grade = 'C';
        } elseif ($mahasiswa->rata_rata <= 85) {
            $mahasiswa->grade = 'B';
        } else {
            $mahasiswa->grade = 'A';
        }

        $mahasiswa->save();

        return redirect('/mahasiswa')->with(['message', 'Data Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->nilai_quis = $request->input('nilai_quis');
        $mahasiswa->nilai_tugas = $request->input('nilai_tugas');
        $mahasiswa->nilai_absensi = $request->input('nilai_absensi');
        $mahasiswa->nilai_praktek = $request->input('nilai_praktek');
        $mahasiswa->nilai_uas = $request->input('nilai_uas');
        $mahasiswa->rata_rata = ($mahasiswa->nilai_quis + $mahasiswa->nilai_tugas + $mahasiswa->nilai_absensi + $mahasiswa->nilai_praktek + $mahasiswa->nilai_uas) / 5;
    
        if ($mahasiswa->rata_rata <= 65) {
            $mahasiswa->grade = 'D';
        } elseif ($mahasiswa->rata_rata <= 75) {
            $mahasiswa->grade = 'C';
        } elseif ($mahasiswa->rata_rata <= 85) {
            $mahasiswa->grade = 'B';
        } else {
            $mahasiswa->grade = 'A';
        }
    
        $mahasiswa->save();
    
        return redirect('/mahasiswa')->with('message', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('message', 'Data Berhasil Dihapus');
    }
}
