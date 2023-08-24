<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama', 'jurusan', 'foto', 'ukt'];
    public $incrementing = false;
    public $timestamps = false;

    public static function generateNIM()
    {
        $year = date('y'); // Mendapatkan tahun saat ini

        // Mendapatkan nomor urut terakhir dari database
        $lastNIM = Mahasiswa::orderBy('nim', 'desc')->first();

        if ($lastNIM) {
            $lastNumber = (int) substr($lastNIM->nim, 2); // Mengambil 4 digit terakhir dari NIM terakhir (setelah tahun)
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); // Increment nomor urut dan pad dengan nol jika kurang dari 4 digit
        } else {
            $newNumber = '0001'; // Jika belum ada data, nomor urut dimulai dari 1
        }

        $nim = $year . $newNumber;

        return $nim;
    }
}
