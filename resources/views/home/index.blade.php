@extends('layouts.app')

@section('title', 'List Nilai Mahasiswa')

@section('content')
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h1>Statistik Grade Mahasiswa</h1>
        <canvas id="myChart"></canvas>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['D', 'C', 'B', 'A'],
                datasets: [{
                    label: 'Statistik Grade Mahasiswa',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    data: [
                        {{ $countD }},
                        {{ $countC }},
                        {{ $countB }},
                        {{ $countA }},
                    ]
                }]
            }
        });
    </script>
@endsection
