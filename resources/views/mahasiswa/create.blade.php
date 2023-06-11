@extends('mahasiswa.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <form action="{{route('mahasiswa.store')}}" method="post" id="myForm" class=" mx-3">
                    @csrf
                    <div class="form-group">
                        <label for="Nim">Nim</label>
                        <input type="text" name="Nim" id="Nim" class="form-control" aria-describedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" id="Nama" class="form-control" aria-describedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="Email" id="Email" class="form-control" aria-describedby="Email">
                    </div>
                    <div class="form-group">
                        <label for="Tanggal Lahir">Tanggal Lahir</label>
                        <input type="text" name="Tanggal Lahir" id="Tanggal Lahir" class="form-control" aria-describedby="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        {{-- <input type="text" name="Kelas" id="Kelas" class="form-control" aria-describedby="Kelas"> --}}
                        <select name="Kelas" id="Kelas" class="form-control">
                            @foreach ($kelas as $kls)
                                <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="text" name="Jurusan" id="Jurusan" class="form-control" aria-describedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone">No Handphone</label>
                        <input type="text" name="No_Handphone" id="No_Handphone" class="form-control" aria-describedby="No_Handphone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
