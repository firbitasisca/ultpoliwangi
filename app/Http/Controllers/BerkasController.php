<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Berkas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'berkas' => Berkas::all(),
        ];

        return view('pages.admin.berkas.index', $data);
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
            'create_nama_berkas' => ['required', Rule::unique('berkas', 'nama_berkas')],
            'create_jenis_berkas' => ['required', 'string']
        ]);

        Berkas::create([
            'nama_berkas' => $validated['create_nama_berkas'],
            'jenis_berkas' => $validated['create_jenis_berkas'],
        ]);

        Alert::success('Success', 'Berkas Berhasil Ditambahkan');

        return redirect()->route('admin.berkas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $berkas = Berkas::findOrFail($id);

        $validated = $request->validate([
            'update_nama_berkas' => ['required', 'string', Rule::unique('berkas', 'nama_berkas')->ignore($berkas->id, 'id')],
            'update_jenis_berkas' => ['required', 'string']
        ]);

        Berkas::where('id', $id)->update([
            'nama_berkas' => $validated['update_nama_berkas'],
            'jenis_berkas' => $validated['update_jenis_berkas'],
        ]);

        Alert::success('Success', 'Berkas Berhasil Diupdate');

        return redirect()->route('admin.berkas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);
        $berkas->delete();
        Alert::success('Success', 'Berkas Berhasil Dihapus');

        return redirect()->route('admin.berkas.index');
    }
}
