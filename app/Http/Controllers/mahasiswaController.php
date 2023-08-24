<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::all();

        return view('mahasiswa.index_mahasiswa')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create_mahasiswa')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk foto
            'ukt' => 'required|numeric',
        ], [
            'nim.required' => 'NIM Wajib Diisi',
            'nim.numeric' => 'NIM Wajib Angka',
            'nim.unique' => 'NIM Sudah Terdaftar',
            'nama.required' => 'Nama Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'ukt.required' => 'UKT Wajib Diisi',
            'ukt.numeric' => 'UKT Wajib Angka',
        ]);

        $data = [
            'nim' => Mahasiswa::generateNIM(),
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'ukt' => $request->ukt,
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/foto_mahasiswa', $filename);
            $data['foto'] = $filename;
        }

        Mahasiswa::create($data);

        return redirect()->to('mahasiswa');
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
        $data = Mahasiswa::where('nim', $id)->first();
        $prodi = Prodi::all();

        return view('mahasiswa.edit_mahasiswa')->with('mahasiswa', $data)->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukt' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'ukt.required' => 'UKT Wajib Diisi',
            'ukt.numeric' => 'UKT Wajib Angka',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $id)->first();

        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'ukt' => $request->ukt,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::delete('public/foto_mahasiswa/' . $mahasiswa->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/foto_mahasiswa', $filename);
            $data['foto'] = $filename;
        }

        $mahasiswa->update($data);

        return redirect()->to('mahasiswa');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus foto dari storage jika ada
        if (!empty($mahasiswa->foto)) {
            Storage::delete('public/foto_mahasiswa/' . $mahasiswa->foto);
        }

        // Hapus data mahasiswa dari database
        $mahasiswa->delete();

        return redirect()->to('mahasiswa');
    }
    public function searchByNIM($nim)
{
    $mahasiswa = Mahasiswa::where('nim', $nim)->first();

    if ($mahasiswa) {
        return response()->json(['mahasiswa' => $mahasiswa]);
    } else {
        return response()->json(['message' => 'Data not found'], 404);
    }
}

}
