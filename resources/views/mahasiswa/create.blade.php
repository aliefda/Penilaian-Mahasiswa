@extends('layouts.app')

@section('title', 'Menu Input Data Mahasiswa')

@section('content')

<div class="container">
    <a href="/admin/mahasiswa" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data">
                @csrf
                @error('nama')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                @error('nilai_quis')
                    <small style="color: red">{{$message}}</small>
                @enderror               
                <div class="form-group">
                    <label for="nilai_quis">Nilai Quiz</label>
                    <input type="number" class="form-control" id="nilai_quis" name="nilai_quis">
                </div>
                @error('nilai_tugas')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="nilai_tugas">Nilai Tugas</label>
                    <input type="number" class="form-control" id="nilai_tugas" name="nilai_tugas">
                </div>
                @error('nilai_absensi')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="nilai_absensi">Nilai Absensi</label>
                    <input type="number" class="form-control" id="nilai_absensi" name="nilai_absensi">
                </div>
                @error('nilai_praktek')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="nilai_praktek">Nilai Praktek</label>
                    <input type="number" class="form-control" id="nilai_praktek" name="nilai_praktek">
                </div>
                @error('nilai_uas')
                    <small style="color: red">{{$message}}</small>
                @enderror                
                <div class="form-group">
                    <label for="nilai_uas">Nilai UAS</label>
                    <input type="number" class="form-control" id="nilai_uas" name="nilai_uas">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection