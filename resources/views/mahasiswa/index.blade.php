@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="container">
        <a href="/admin/mahasiswa/create" class="btn btn-primary mb-3">Tambah Data</a>

        @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{$message}}</p>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table table-bordered table-hover table-stiped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nilai Quiz</th>
                        <th scope="col">Nilai Tugas</th>
                        <th scope="col">Nilai Absensi</th>
                        <th scope="col">Nilai Praktek</th>
                        <th scope="col">Nilai UAS</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mahasiswa)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->nilai_quis }}</td>
                            <td>{{ $mahasiswa->nilai_tugas }}</td>
                            <td>{{ $mahasiswa->nilai_absensi }}</td>
                            <td>{{ $mahasiswa->nilai_praktek }}</td>
                            <td>{{ $mahasiswa->nilai_uas }}</td>
                            <td>{{ $mahasiswa->rata_rata }}</td>
                            <td>{{ $mahasiswa->grade }}</td>
                            <td>
                            <a href="{{route('mahasiswa.edit', $mahasiswa->id)}}" class="btn btn-warning mb-1">Edit</a>
                            <form action="{{route('mahasiswa.destroy', $mahasiswa->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
