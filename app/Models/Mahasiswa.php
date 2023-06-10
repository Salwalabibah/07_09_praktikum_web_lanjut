<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswas";
    public $timestamps = false;
    protected $primaryKey = 'Nim';

    /**
     * @var array
     */
    protected $fillable = [
        'Nim',
        'Nama',
        'Email',
        'Tanggal_Lahir',
        'Kelas',
        'Jurusan',
        'No_Handphone',
    ];
}
