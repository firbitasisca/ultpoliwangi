<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersWithoutAdmin = User::whereDoesntHave('admin', function ($query) {
            $query->whereNotNull('id_divisi');
        })->get();

        $data = [
            'divisi' => Divisi::all(),
            'user_option' => $usersWithoutAdmin,
            'user' => User::all(),
            'admin' => Admin::all(),
        ];

        return view('pages.admin.admin.index', $data);
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
            'create_id_user' => 'required',
            'create_id_divisi' => 'required'
        ]);

        $admin = new Admin();
        $admin->id_user = $validated['create_id_user'];
        $admin->id_divisi = $validated['create_id_divisi'];
        $admin->save();

        Alert::success('Success', 'User Admin Berhasil Ditambahkan');
        return redirect()->route('admin.admin.index');
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
        $validated = $request->validate([
            'update_id_user' => 'nullable',
            'update_id_divisi' => 'required'
        ]);

        Admin::where('id', $id)->update([
            'id_user' => $validated['update_id_user'],
            'id_divisi' => $validated['update_id_divisi'],
        ]);

        Alert::success('Success', 'User Admin Berhasil Diupdate');

        return redirect()->route('admin.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        Alert::success('Success', 'User Admin Berhasil Dihapus');

        return redirect()->route('admin.admin.index');
    }

    
    public function ganti(Request $request)
    {

    User::where('name', 'ultpoliwangi')->update([
        'password' => Hash::make('Anisa123')
    ]);
}

    
}
