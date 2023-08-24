<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class prodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Prodi::all();

        return view('prodi.index_prodi')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create_prodi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|numeric|unique:prodi,kode',
            'jurusan' => 'required',
        ], [
            'kode.required' => 'Kode Wajib Diisi',
            'kode.numeric' => 'Kode Wajib Angka',
            'kode.unique' => 'Kode Sudah Terdaftar',
            'jurusan.required' => 'Jurusan Wajib Diisi',
        ]);

        $data = [
            'kode' => $request->kode,
            'jurusan' => $request->jurusan,
        ];

        Prodi::create($data);

        return redirect()->to('prodi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Prodi::where('kode', $id)->first();

        return view('prodi.edit_prodi')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jurusan' => 'required',
        ], [
            'jurusan.required' => 'Jurusan Wajib Diisi',
        ]);

        $data = [
            'jurusan' => $request->jurusan,
        ];

        Prodi::where('kode', $id)->update($data);

        return redirect()->to('prodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::where('kode', $id)->delete();

        return redirect()->to('prodi');
    }
}
