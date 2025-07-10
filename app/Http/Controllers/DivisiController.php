<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'divisi' => Divisi::all(),
        ];

        return view('pages.admin.divisi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'create_nama_divisi' => ['required', 'string', Rule::unique('divisis', 'nama_divisi')]
        ]);

        $divisi = new Divisi;
        $divisi->nama_divisi = $validated['create_nama_divisi'];
        $divisi->save();

        Alert::success('Success', 'Divisi Berhasil Ditambahkan');

        return redirect()->route('admin.divisi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $divisi = Divisi::findOrFail($id);

        $validated = $request->validate([
            'update_nama_divisi' => ['required', 'string', Rule::unique('divisis', 'nama_divisi')->ignore($divisi->id, 'id')]
        ]);

        Divisi::where('id', $id)->update([
            'nama_divisi' => $validated['update_nama_divisi'],
        ]);

        Alert::success('Success', 'Divisi Berhasil Diupdate');

        return redirect()->route('admin.divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        Alert::success('Success', 'Divisi Berhasil Dihapus');

        return redirect()->route('admin.divisi.index');
    }
}
