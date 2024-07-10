<?php

namespace App\Http\Controllers;

use App\Models\PertanyaanGuru;
use App\Models\KompetensiGuru;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Alert;

class PertanyaanGuruController extends Controller
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
        $pertanyaanGuru = PertanyaanGuru::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('pertanyaanguru.index', compact('pertanyaanGuru'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kompetensiGuru = KompetensiGuru::all();
        return view('pertanyaanguru.create', compact('kompetensiGuru'));

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
            'pertanyaan' => 'required',
            'id_kompetensi' => 'required',
        ]);

        $pertanyaanGuru = new PertanyaanGuru();
        $pertanyaanGuru->pertanyaan = $request->pertanyaan;
        $pertanyaanGuru->id_kompetensi = $request->id_kompetensi;
        $pertanyaanGuru->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('pertanyaanguru.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PertanyaanGuru  $pertanyaanGuru
     * @return \Illuminate\Http\Response
     */
    public function show(PertanyaanGuru $pertanyaanGuru)
    {
        return view('pertanyaanguru.show', compact('pertanyaanGuru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PertanyaanGuru  $pertanyaanGuru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaanGuru = PertanyaanGuru::findOrFail($id);
        $kompetensiGuru = KompetensiGuru::all();
        return view('pertanyaanguru.edit', compact('pertanyaanGuru', 'kompetensiGuru'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PertanyaanGuru  $pertanyaanGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required',
            'id_kompetensi' => 'required',
        ]);

        $pertanyaanGuru = PertanyaanGuru::findOrFail($id);
        $pertanyaanGuru->pertanyaan = $request->pertanyaan;
        $pertanyaanGuru->id_kompetensi = $request->id_kompetensi;
        $pertanyaanGuru->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('pertanyaanguru.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PertanyaanGuru  $pertanyaanGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaanGuru = PertanyaanGuru::findOrFail($id);
        $pertanyaanGuru->delete();

        Alert::success('Success', 'data berhasil dihapus')->autoclose(1000);
        return redirect()->route('pertanyaanguru.index');

    }
}
