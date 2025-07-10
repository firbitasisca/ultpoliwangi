<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'prodi' => Prodi::all(),
        ];

        return view('pages.admin.prodi.index', $data);
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
            'create_nama_prodi' => ['required', 'string', Rule::unique('prodis', 'nama_prodi')]
        ]);

        $prodi = new Prodi;
        $prodi->nama_prodi = $validated['create_nama_prodi'];
        $prodi->save();

        Alert::success('Success', 'Prodi Berhasil Ditambahkan');

        return redirect()->route('admin.prodi.index');
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
        $prodi = Prodi::findOrFail($id);

        $validated = $request->validate([
            'update_nama_prodi' => [
                'required', 'string', Rule::unique('prodis', 'nama_prodi')->ignore($prodi->id, 'id')
            ]
        ]);

        Prodi::where('id', $id)->update([
            'nama_prodi' => $validated['update_nama_prodi'],
        ]);

        Alert::success('Success', 'Prodi Berhasil Diupdate');

        return redirect()->route('admin.prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        Alert::success('Success', 'Prodi Berhasil Dihapus');

        return redirect()->route('admin.prodi.index');
    }
}
