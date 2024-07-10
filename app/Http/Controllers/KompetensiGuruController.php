<?php

namespace App\Http\Controllers;

use App\Models\KompetensiGuru;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Alert;

class KompetensiGuruController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', IsAdmin::class]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kompetensiGuru = KompetensiGuru::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('kompetensiguru.index', compact('kompetensiGuru'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kompetensiguru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kompetensi' => 'required|unique:kompetensi_gurus',
        ]);

        $kompetensiGuru = new KompetensiGuru();
        $kompetensiGuru->kompetensi = $request->kompetensi;
        $kompetensiGuru->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('kompetensiguru.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KompetensiGuru  $kompetensiGuru
     * @return \Illuminate\Http\Response
     */
    public function show(KompetensiGuru $kompetensiGuru)
    {
        return view('kompetensiguru.show', compact('kompetensiGuru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KompetensiGuru  $kompetensiGuru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kompetensiGuru = KompetensiGuru::findOrFail($id);
        return view('kompetensiguru.edit', compact('kompetensiGuru'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KompetensiGuru  $kompetensiGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kompetensi' => 'required',
        ]);

        $kompetensiGuru = KompetensiGuru::findOrFail($id);
        $kompetensiGuru->kompetensi = $request->kompetensi;
        $kompetensiGuru->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('kompetensiguru.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KompetensiGuru  $kompetensiGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompetensiGuru = KompetensiGuru::findOrFail($id);
        $kompetensiGuru->delete();

        Alert::success('Success', 'data berhasil dihapus')->autoclose(1000);
        return redirect()->route('kompetensiguru.index');

    }
}
