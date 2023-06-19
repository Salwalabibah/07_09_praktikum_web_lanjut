@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div>
        <h5 class="text-center">JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h5>
        <h3 class="text-uppercase text-center">kartu hasil studi (khs)</h3>
    </div>
    <div class="body mt-5">
        <ul class="list-group">
            <li class="list-unstyled"><b>Nama: </b>{{$mahasiswa->Nama}}</li>
            <li class="list-unstyled"><b>Nim: </b>{{$mahasiswa->Nim}}</li>
            <li class="list-unstyled"><b>Kelas: </b>{{$mahasiswa->kelas->nama_kelas}}</li>
        </ul>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-bold text-capitalize">mata kuliah</th>
                    <th class="text-bold text-capitalize">SKS</th>
                    <th class="text-bold text-capitalize">semester</th>
                    <th class="text-bold text-capitalize">nilai</th>
                </tr>
                @foreach ($mahasiswa->mataKuliah as $mhs)
                <tr>
                    <td>{{$mhs->nama_matkul}}</td>
                    <td>{{$mhs->sks}}</td>
                    <td>{{$mhs->semester}}</td>
                    <td>{{$mhs->pivot->nilai}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
