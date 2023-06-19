@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Mahasiswa
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush"  class=" mx-3">
                    <li class="list-group-item"><b>Nim: </b>{{$mahasiswa->Nim}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$mahasiswa->Nama}}</li>
                    <li class="list-group-item"><b>Foto Mahasiswa: </b><img src="{{asset('storage/'. $mahasiswa->image_path)}}" alt="" style="max-width: 100px; max-height: 100px"></li>
                    <li class="list-group-item"><b>Kelas: </b>{{$mahasiswa->kelas->nama_kelas}}</li>
                    <li class="list-group-item"><b>Jurusan: </b>{{$mahasiswa->Jurusan}}</li>
                </ul>
            </div>
            <a href="{{route('mahasiswa.index')}}" class="btn btn-success m-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
