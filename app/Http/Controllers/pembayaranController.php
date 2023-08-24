<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembayaran::all();

        return view('pembayaran.pembayaran')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembayaran.create_pembayaran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data pembayaran
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'ukt' => 'required|numeric',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
            'ukt.required' => 'UKT Wajib Diisi',
        ]);

        // Simpan data pembayaran ke database
        $pembayaran = new Pembayaran;
        $pembayaran->kode_pembayaran = $request->kode;
        $pembayaran->nim = $request->nim;
        $pembayaran->nama = $request->nama;
        $pembayaran->jurusan = $request->jurusan;
        $pembayaran->ukt = $request->ukt;
        $pembayaran->tanggal_pembayaran = date('Y-m-d');
        $pembayaran->status = 'Dibayar';
        $pembayaran->save();

        // Tampilkan notifikasi atau redirect ke halaman lain
        return redirect('/pembayaran')->with('success', 'Pembayaran berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetak($id)
    {
        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            return view('pembayaran.bukti_transaksi', compact('pembayaran'));
        } else {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function cetakPDF(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // Query data pembayaran dari database berdasarkan rentang tanggal
        $data = Pembayaran::whereBetween('tanggal_pembayaran', [$tanggalAwal, $tanggalAkhir])->get();

        // Render view 'cetak_pdf' dengan data pembayaran dan tanggal periode
        $html = View::make('pembayaran.cetak_pdf', compact('data', 'tanggalAwal', 'tanggalAkhir'))->render();

        // Buat instance Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Opsional) Konfigurasi opsi PDF, seperti ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Tampilkan PDF dalam browser
        return $dompdf->stream('laporan_pembayaran.pdf');
    }
}
