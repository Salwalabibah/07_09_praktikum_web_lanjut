<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index(Request $request)
    {
        //menampilkan data menggunakan pagination
        $mahasiswa = Mahasiswa::all();
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
        return view('mahasiswa.index', compact('mahasiswa'))
        ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mahasiswa.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'Nim'=>'required',
            'Nama'=>'required',
            'Kelas'=>'required',
            'Jurusan'=>'required',
            'No_Handphone'=>'required',
        ]);

        // fungsi eloquent untuk menambah data dengan relasi belongsTo
        Mahasiswa::create($request->all());

        // jika berhasi ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Nim)
    {
        //
        // menampilkan data dengan menemukan/berdasarkan NIM mahasiswa
        $mahasiswa = Mahasiswa::find($Nim);

        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $Nim)
    {
        //menampilkan detail data berdasarkan nim untuk diedit
        $mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Nim)
    {
        //validasi data
        $request->validate([
            'Nim'=>'required',
            'Nama'=>'required',
            'Kelas'=>'required',
            'Jurusan'=>'required',
            'No_Handphone'=>'required',
        ]);


        // fungsi eloquent untuk menambah data dengan relasi belongsTo
        Mahasiswa::find($Nim)->update($request->all());

        // jika berhasi diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Nim)
    {
        //untuk hapus data
        Mahasiswa::find($Nim)->delete();

        // jika berhasi didelete, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Didelete');
    }
}
