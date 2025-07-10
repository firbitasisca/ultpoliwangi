<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\BerkasLayanan;
use App\Models\Divisi;
use App\Models\Layanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'layanan' => Layanan::all(),
            'divisi' => Divisi::all(),
            'berkas' => Berkas::all(),
            'berkaslayanan' => BerkasLayanan::all()
        ];

        return view('pages.admin.layanan.index', $data);
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
            'create_id_divisi' => 'required',
            'create_nama_layanan' => ['required', 'string', Rule::unique('layanans', 'nama_layanan')],
            'create_estimasi_layanan' => ['required'],
            'create_berkas' => ['required', 'array', 'min:1'],
        ]);

        $newlayanan = Layanan::create([
            'id_divisi' => $validated['create_id_divisi'],
            'nama_layanan' => $validated['create_nama_layanan'],
            'estimasi_layanan' => $validated['create_estimasi_layanan'],
        ]);

        $berkas_convert = collect($validated['create_berkas']);

        $berkas = Berkas::all();
        $check_berkas = $berkas_convert->except('_token', 'nama_berkas', 'create_id_divisi', 'create_nama_layanan', 'create_estimasi_layanan');


        if ($check_berkas) {
            foreach ($check_berkas as $berkasId) {
                if ($berkas->contains('id', $berkasId)) {
                    BerkasLayanan::create([
                        'id_berkas' => $berkasId,
                        'id_layanan' => $newlayanan->id,
                    ]);
                }
            }
        }

        Alert::success('Success', 'Layanan Berhasil Ditambahkan');

        return redirect()->route('admin.layanan.index');
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
        $layanan = Layanan::findOrFail($id);


        $validated = $request->validate([
            'update_id_divisi' => ['required', 'string'],
            'update_nama_layanan' => ['required', 'string', Rule::unique('layanans', 'nama_layanan')->ignore($layanan->id, 'id')],
            'update_estimasi_layanan' => ['required', 'string'],
            'update_berkas' => ['required', 'array', 'min:1'],
        ]);

        Layanan::where('id', $id)->update([
            'id_divisi' => $validated['update_id_divisi'],
            'estimasi_layanan' => $validated['update_estimasi_layanan'],
            'nama_layanan' => $validated['update_nama_layanan'],
        ]);
        $berkas_convert = collect($validated['update_berkas']);

        // Mengambil data berkaslayanan untuk layanan ini
        $berkaslayanan = BerkasLayanan::where('id_layanan', $id)->get();

        // Loop melalui data yang dicentang dari form
        foreach ($berkas_convert as $berkasId) {
            // Cek apakah berkaslayanan dengan id berkas dan id layanan sudah ada
            if (!$berkaslayanan->contains(function ($item) use ($berkasId) {
                return $item->id_berkas == $berkasId;
            })) {
                // Jika belum ada, tambahkan data baru ke tabel berkaslayanan
                BerkasLayanan::create([
                    'id_berkas' => $berkasId,
                    'id_layanan' => $id,
                ]);
            }
        }

        // Hapus data berkaslayanan yang tidak dicentang
        $berkaslayanan->each(function ($item) use ($berkas_convert) {
            if (!$berkas_convert->contains($item->id_berkas)) {
                $item->delete();
            }
        });

        Alert::success('Success', 'Layanan Berhasil Diupdate');

        return redirect()->route('admin.layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        Alert::success('Success', 'Layanan Berhasil Dihapus');

        return redirect()->route('admin.layanan.index');
    }
}
