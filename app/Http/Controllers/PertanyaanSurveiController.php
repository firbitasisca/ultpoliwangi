<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\PertanyaanSurvei;
use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanSurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveiWithPertanyaan = Survei::has('pertanyaan_survei')->get();
        $data = [
            'pertanyaan' => Pertanyaan::all(),
            'survei' => $surveiWithPertanyaan,
            'pertanyaansurvei' => PertanyaanSurvei::all()
        ];
        return view('pages.admin.pertanyaan-survei.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usedSurveiIds = PertanyaanSurvei::pluck('id_survei')->unique();

        $usersWithoutAdmin = Survei::where('status', 'Aktif')->whereNotIn('id', $usedSurveiIds)->get();

        $data = [
            'survei_option' => $usersWithoutAdmin,
            'pertanyaan' => Pertanyaan::all(),
            'survei' => Survei::all(),
        ];
        return view('pages.admin.pertanyaan-survei.form-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'create_id_survei' => 'required',
            'pertanyaan' => 'required|array|min:1',
        ]);

        $id_survei = $validated['create_id_survei'];
        $id_pertanyaan = $validated['pertanyaan'];

        $pertanyaan = Pertanyaan::all();

        foreach ($id_pertanyaan as $pertanyaanID) {
            if ($pertanyaan->contains('id', $pertanyaanID)) {
                PertanyaanSurvei::create([
                    'id_survei' => $id_survei,
                    'id_pertanyaan' => $pertanyaanID,
                ]);
            }
        }

        Alert::success('Success', 'Berhasil Menambahkan Pertanyaan Survei');

        return redirect()->route('admin.pertanyaan.survei.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Ambil data pertanyaansurvei berdasarkan ID survei
        $pertanyaansurvei = PertanyaanSurvei::where('id_survei', $id)->get();

        // dd($pertanyaansurvei);
        // Ambil data survei untuk informasi tambahan
        $survei = Survei::findOrFail($id);

        // Kirim data ke view
        return view('pages.admin.pertanyaan-survei.show', compact('pertanyaansurvei', 'survei'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surveis = Survei::findOrFail($id);
        $pertanyaanSurveis = PertanyaanSurvei::where('id_survei', $id)->get();
        $pertanyaan = Pertanyaan::all();

        $data = [
            'survei' => $surveis,
            'pertanyaansurvei' => $pertanyaanSurveis,
            'pertanyaan' => $pertanyaan,
            'action' => route('admin.pertanyaan.survei.update', $id)
        ];

        return view('pages.admin.pertanyaan-survei.form-update', $data);
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
        $validated = $request->validate([
            'pertanyaan' => 'required|array|min:1',
        ]);

        $id_survei = $id;
        $pertanyaanIDs = $validated['pertanyaan'];

        $existingPertanyaanIDs = PertanyaanSurvei::where('id_survei', $id_survei)->pluck('id_pertanyaan')->toArray();

        $pertanyaanToDelete = array_diff($existingPertanyaanIDs, $pertanyaanIDs);

        if (!empty($pertanyaanToDelete)) {
            PertanyaanSurvei::where('id_survei', $id_survei)
                ->whereIn('id_pertanyaan', $pertanyaanToDelete)
                ->delete();
        }

        $pertanyaanToAdd = array_diff($pertanyaanIDs, $existingPertanyaanIDs);

        if (!empty($pertanyaanToAdd)) {
            $newPertanyaan = [];
            foreach ($pertanyaanToAdd as $pertanyaanID) {
                $newPertanyaan[] = [
                    'id_survei' => $id_survei,
                    'id_pertanyaan' => $pertanyaanID,
                ];
            }
            PertanyaanSurvei::insert($newPertanyaan);
        }

        Alert::success('Success', 'Pertanyaan Survei Berhasil Diupdate');

        return redirect()->route('admin.pertanyaan.survei.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaanSurvei = PertanyaanSurvei::where('id_survei', $id)->get();

        // Delete the PertanyaanSurvei records
        $pertanyaanSurvei->each(function ($item) {
            $item->delete();
        });
        Alert::success('Success', 'Pertanyaan Survei Berhasil Dihapus');

        return redirect()->route('admin.pertanyaan.survei.index');
    }
}
