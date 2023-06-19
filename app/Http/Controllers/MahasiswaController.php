<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    //
    public function index(Request $request)
    {
        //menampilkan data menggunakan pagination
        if ($request->has('search')) {
            $mahasiswa = Mahasiswa::with('kelas')
                ->where('Nama', 'LIKE', '%'.$request->search.'%')
                ->paginate(5);
        }else{
            $mahasiswa = Mahasiswa::with('kelas')
                ->paginate(5);
        }
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('kelas'));
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
            'image_path'=>'required',
            'kelas_id'=>'required',
            'Jurusan'=>'required',
        ]);


        if($request->hasFile('image_path')){
            $foto = $request->file('image_path')->store('images', 'public');
        }


        Mahasiswa::create([
            'Nim'=>$request->get('Nim'),
            'Nama'=>$request->get('Nama'),
            'image_path'=>$foto,
            'kelas_id'=>$request->get('kelas_id'),
            'Jurusan'=>$request->get('Jurusan'),
        ]);


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
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();

        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $Nim)
    {
        //menampilkan detail data berdasarkan nim untuk diedit
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Nim)
    {
        $mahasiswa = Mahasiswa::find($Nim);
        //validasi data
        $request->validate([
            'Nim'=>'required',
            'Nama'=>'required',
            'image_path'=>'required',
            'kelas_id'=>'required',
            'Jurusan'=>'required',
        ]);

        $mahasiswa->update($request->except('image_path'));
        if($request->hasFile('image_path')){
            if($mahasiswa->image_path && file_exists(storage_path('app/public/' . $mahasiswa->image_path))){
                Storage::delete('public/' . $mahasiswa->image_path);
            }
            $image = $request->file('image_path')->store('images', 'public');

            $mahasiswa->image_path = $image;
            $mahasiswa->save();
        }


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

    public function nilai(string $nim){
        $mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->where('nim', $nim)->first();
        return view ('mahasiswa.nilai', compact('mahasiswa'));
    }

    public function cetak_krs(string $nim){
        $mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->where('Nim', $nim)->first();
        $pdf = PDF::loadView('mahasiswa.cetakNilai', compact('mahasiswa'));
        return $pdf->stream();
    }
}
