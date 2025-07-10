<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pertanyaans' => Pertanyaan::all(),
        ];

        return view('pages.admin.pertanyaan.index', $data);
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
            'create_pertanyaan' => ['required', 'string']
        ]);

        // Periksa apakah karakter terakhir adalah '?'
        $pertanyaan = $validated['create_pertanyaan'];
        if (substr($pertanyaan, -1) !== '?') {
            $pertanyaan .= '?';
        }

        $pertanyaanModel = new Pertanyaan();
        $pertanyaanModel->pertanyaan = $pertanyaan;
        $pertanyaanModel->save();

        Alert::success('Success', 'Pertanyaan Berhasil Ditambahkan');

        return redirect()->route('admin.pertanyaan.index');
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
        $pertanyaan = Pertanyaan::findOrFail($id);

        $validated = $request->validate([
            'update_pertanyaan' => [
                'required', 'string'
            ]
        ]);

        // Periksa apakah karakter terakhir adalah '?'
        $pertanyaan = $validated['update_pertanyaan'];
        if (substr($pertanyaan, -1) !== '?') {
            $pertanyaan .= '?';
        }

        Pertanyaan::where('id', $id)->update([
            'pertanyaan' => $pertanyaan,
        ]);

        Alert::success('Success', 'Pertanyaan Berhasil Diupdate');

        return redirect()->route('admin.pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        Alert::success('Success', 'Pertanyaan Berhasil Dihapus');

        return redirect()->route('admin.pertanyaan.index');
    }
}
