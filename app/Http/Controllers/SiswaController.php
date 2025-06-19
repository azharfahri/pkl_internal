<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $siswa = [
        ['id' => 1, 'nama'=> 'agus', 'kelas' => 'X TKJ 1'],
        ['id' => 2, 'nama'=> 'hendri', 'kelas' => 'XI RPL 1'],

    ];
    public function index()
    {
        if (!Session::has('siswa')) {
            Session::put('siswa', $this->siswa);
        }
        $data = Session::get('siswa', []);
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);
        $datasiswa = Session::get('siswa');
        $datasiswa[] = [
            'id' => count($datasiswa) + 1,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ];
        Session::put('siswa', $datasiswa);
        return redirect()->route('siswa.index');
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
}
