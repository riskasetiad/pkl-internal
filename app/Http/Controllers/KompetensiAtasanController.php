<?php

namespace App\Http\Controllers;

use App\Models\KompetensiAtasan;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Alert;

class KompetensiAtasanController extends Controller
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
        $kompetensiAtasan = KompetensiAtasan::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('kompetensi.index', compact('kompetensiAtasan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kompetensi.create');
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
            'kompetensi' => 'required|unique:kompetensi_atasans',
        ]);

        $kompetensiAtasan = new KompetensiAtasan();
        $kompetensiAtasan->kompetensi = $request->kompetensi;
        $kompetensiAtasan->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('kompetensi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function show(KompetensiAtasan $kompetensiAtasan)
    {
        return view('kompetensi.show', compact('kompetensiAtasan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kompetensiAtasan = KompetensiAtasan::findOrFail($id);
        return view('kompetensi.edit', compact('kompetensiAtasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kompetensi' => 'required',
        ]);

        $kompetensiAtasan = KompetensiAtasan::findOrFail($id);
        $kompetensiAtasan->kompetensi = $request->kompetensi;
        $kompetensiAtasan->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('kompetensi.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompetensiAtasan = KompetensiAtasan::findOrFail($id);
        $kompetensiAtasan->delete();

        Alert::success('Success', 'data berhasil dihapus')->autoclose(1000);
        return redirect()->route('kompetensi.index');

    }
}
