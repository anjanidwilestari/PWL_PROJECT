<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::paginate(5);
        $posts = User::orderBy('nama', 'asc')->paginate(5);
        return view('user.userindex', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.userdetail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.useredit',compact('user'));
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
        $request->validate([
            'nama'=> 'required',
            'username' => 'required|string|max:20',
            'password' => 'min:8|confirmed|nullable',
            'email' => 'required|email|unique:users,email,'.$id,
            'no_hp' => 'string|max:13|required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jabatan' => 'required'
        ]);

        $user = User::findOrFail($id);
        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(storage_path('app/public/'.$user->foto))) {
                Storage::delete('public/'.$user->foto);
            }
            $image_name = $request->file('foto')->store('user','public');
            $user->foto = $image_name;
        }
        $user -> nama = $request->nama;
        $user -> username = $request->username;
        if (!$request->password && !$request->password_confirmation) {
            // dd('ini ga ganti');
        } else {
            $user->password = Hash::make($request->password);
        }
        $user -> email = $request->email;
        $user -> no_hp = $request->no_hp;
        $user -> tanggal_lahir = $request->tanggal_lahir;
        $user -> alamat = $request->alamat;
        $user -> jabatan = $request->jabatan;
        $user -> save();

        Alert::success('Success','User Berhasil Diupdate');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')
            -> with('success', 'User Berhasil Dihapus');
    }
}
