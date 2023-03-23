@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')

@section('content')

<h1>Input Nilai Mahasiswa</h1>
<form method="POST" action="{{route('mahasiswa.update', $mahasiswa->id)}}">
    @method('PUT')
    @csrf
    @error('nama')
        <small style="color: red">{{$message}}</small>
    @enderror
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$mahasiswa->nama}}">
    </div>
    @error('nilai_quis')
        <small style="color: red">{{$message}}</small>
    @enderror
    <div class="form-group">
        <label for="nilai_quis">Nilai Quiz</label>
        <input type="number" class="form-control" id="nilai_quis" name="nilai_quis" value="{{$mahasiswa->nilai_quis}}">
    </div>
    @error('nilai_tugas')
        <small style="color: red">{{$message}}</small>
    @enderror    
    <div class="form-group">
        <label for="nilai_tugas">Nilai Tugas</label>
        <input type="number" class="form-control" id="nilai_tugas" name="nilai_tugas" value="{{$mahasiswa->nilai_tugas}}">
    </div>
    @error('nilai_absensi')
        <small style="color: red">{{$message}}</small>
    @enderror    
    <div class="form-group">
        <label for="nilai_absensi">Nilai Absensi</label>
        <input type="number" class="form-control" id="nilai_absensi" name="nilai_absensi" value="{{$mahasiswa->nilai_absensi}}">
    </div>
    @error('nilai_praktek')
        <small style="color: red">{{$message}}</small>
    @enderror   
    <div class="form-group">
        <label for="nilai_praktek">Nilai Praktek</label>
        <input type="number" class="form-control" id="nilai_praktek" name="nilai_praktek" value="{{$mahasiswa->nilai_praktek}}">
    </div>
    @error('nilai_uas')
        <small style="color: red">{{$message}}</small>
    @enderror   
    <div class="form-group">
        <label for="nilai_uas">Nilai UAS</label>
        <input type="number" class="form-control" id="nilai_uas" name="nilai_uas" value="{{$mahasiswa->nilai_uas}}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection