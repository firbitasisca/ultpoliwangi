<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'surveis' => Survei::all(),
        ];

        return view('pages.admin.survei.index', $data);
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
            'create_nama_survei' => ['required', 'string', 'max:255', Rule::unique('surveis', 'nama_survei')],
            'create_tahun' => ['required'],
            'create_status' => ['required', 'string'],
        ]);

        $survei = new Survei();
        $survei->nama_survei = $validated['create_nama_survei'];
        $survei->tahun = $validated['create_tahun'];
        $survei->status = $validated['create_status'];
        $survei->save();

        Alert::success('Success', 'Survei Berhasil Ditambahkan');

        return redirect()->route('admin.survei.index');
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
        $survei = Survei::findOrFail($id);

        $validated = $request->validate([
            'update_nama_survei' => ['required', 'string', 'max:255', Rule::unique('surveis', 'nama_survei')->ignore($survei->id, 'id')],
            'update_tahun' => ['required'],
            'update_status' => ['required', 'string'],
        ]);

        Survei::where('id', $id)->update([
            'nama_survei' => $validated['update_nama_survei'],
            'tahun' => $validated['update_tahun'],
            'status' => $validated['update_status'],
        ]);

        Alert::success('Success', 'Survei Berhasil Diupdate');

        return redirect()->route('admin.survei.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survei = Survei::findOrFail($id);
        $survei->delete();

        Alert::success('Success', 'Survei Berhasil Dihapus');

        return redirect()->route('admin.survei.index');
    }
}
