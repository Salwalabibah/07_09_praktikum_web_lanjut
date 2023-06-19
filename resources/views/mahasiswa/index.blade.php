@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-left my-2 mt-5">
                <form action="{{route('mahasiswa.index')}}" method="GET">
                    <input type="text" name="search" value="">
                    <input type="submit" value="search">
                </form>
            </div>
            <div class="float-right my-2 mt-5">
                <a href="{{route('mahasiswa.create')}}" class="btn btn-success">Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-succes">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Image</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{$mhs->Nim}}</td>
                <td>{{$mhs->Nama}}</td>
                <td><img src="{{asset('storage/'. $mhs->image_path)}}" alt="" style="max-width: 100px; max-height: 100px"></td>
                <td>{{optional($mhs->kelas)->nama_kelas}}</td>
                <td>{{$mhs->Jurusan}}</td>
                <td>
                    <form action="{{route('mahasiswa.destroy', $mhs->Nim)}}" method="POST">
                        <a href="{{route('mahasiswa.show', $mhs->Nim)}}" class="btn btn-success">Show</a>
                        <a href="{{route('mahasiswa.edit', $mhs->Nim)}}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="{{route('mahasiswa.nilai', $mhs->Nim)}}" class="btn btn-info">Nilai</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="pagination-container">
        {{$mahasiswa->links('pagination::bootstrap-5')}}
    </div>
@endsection
