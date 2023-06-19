@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
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
            <form action="{{route('mahasiswa.update', $mahasiswa->Nim)}}" method="post" id="myForm"  class=" mx-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="Nim">Nim</label>
                    <input type="text" name="Nim" id="Nim" class="form-control" aria-describedby="Nim" value="{{$mahasiswa->Nim}}">
                </div>
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" name="Nama" id="Nama" class="form-control" aria-describedby="Nama" value="{{$mahasiswa->Nama}}">
                </div>
                <div class="form-group">
                    <label for="image">Foto Mahasiswa: </label>
                    <input type="file" name="image_path" id="image_path" class="form-control" required="required" value="{{$mahasiswa->image_path}}"><br>
                </div>
                <div class="form-group">
                    <label for="Kelas">Kelas</label>
                    {{-- <input type="text" name="Kelas" id="Kelas" class="form-control" aria-describedby="Kelas" value="{{$mahasiswa->kelas->nama_kelas}}"> --}}
                    <select name="kelas_id" id="kelas_id" class="form-control">
                        @foreach ($kelas as $kls)
                            <option value="{{$kls->id}}" {{$mahasiswa->kelas_id == $kls->id ? 'selected' : ''}}>{{$kls->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Jurusan">Jurusan</label>
                    <input type="text" name="Jurusan" id="Jurusan" class="form-control" aria-describedby="Jurusan" value="{{$mahasiswa->Jurusan}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
