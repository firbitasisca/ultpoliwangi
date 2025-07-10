<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::all(),
        ];

        return view('pages.admin.user.index', $data);
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
            'create_name' => ['required', 'string', Rule::unique('users', 'name')],
            'create_email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'create_password' => ['required', 'confirmed', 'min:8'],
            'create_password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
        ]);

        $slug = Str::slug($validated['create_name'], '');

        $user = new User;
        $user->name = $slug;
        $user->email = $validated['create_email'];
        $user->password = hash::make($request->create_password);
        $user->save();

        Alert::success('Success', 'User Berhasil Ditambahkan');

        return redirect()->route('admin.user.index');
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
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'update_name' => ['required', 'string', Rule::unique('users', 'name')->ignore($user->id, 'id')],
            'update_email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($user->id, 'id')],
            'update_password' => ['nullable', 'confirmed', 'min:8'],
            'update_password_confirmation' => ['nullable', Rules\Password::defaults(), 'min:8'],
        ]);

        $slug = Str::slug($validated['update_name'], '');

        $user = User::find($id);
        $user->name = $slug;
        $user->email = $validated['update_email'];
        $user->password = hash::make($request->update_password);
        $user->save();

        Alert::success('Success', 'User Berhasil Diubah');

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'User Berhasil Dihapus');

        return redirect()->route('admin.user.index');
    }

    public function ubah_password()
    {
    User::where('id', '1')->update([
        'password' => Hash::make('passwordBaru123')
    ]);

    echo "passowrd berhasil diubah";
}
}
