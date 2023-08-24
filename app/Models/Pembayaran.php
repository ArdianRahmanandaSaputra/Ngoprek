<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'kode_pembayaran';
    protected $fillable = ['kode_pembayaran', 'nim', 'nama', 'jurusan', 'ukt', 'tanggal_pembayaran', 'status'];
    public $incrementing = false;
    public $timestamps = false;

    public static function generateKodePembayaran()
    {
        $date = date('Ymd'); // Mendapatkan tanggal saat ini dalam format Ymd (misal: 20230702)
        $time = date('His'); // Mendapatkan waktu saat ini dalam format His (misal: 132245)

        $kode = $date . $time;

        return $kode;
    }
}
