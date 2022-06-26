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
        $pagination = 5;
        $user = User::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('username', 'like', "%{$request->keyword}%")
                ->orWhere('nama', 'like', "%{$request->keyword}%")
                ->orWhere('alamat', 'like', "%{$request->keyword}%")
                ->orWhere('email', 'like', "%{$request->keyword}%")
                ->orWhere('no_hp', 'like', "%{$request->keyword}%")
                ->orWhere('tanggal_lahir', 'like', "%{$request->keyword}%")
                ->orWhere('role', 'like', "%{$request->keyword}%");
        })->orderBy('nama')->paginate($pagination);

        return view('user.userindex', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('user.usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required',
            //'password_confirmation' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'string|max:13|required|unique:users',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'foto'=> 'required',
            'role' => 'required',
        ]);

        $user = new User;
        $user->nama = $request->get('nama');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        //$user->password_confirmation = $request->get('password_confirmation');
        $user->email = $request->get('email');
        $user->no_hp = $request->get('no_hp');
        $user->tanggal_lahir = $request->get('tanggal_lahir');
        $user->alamat = $request->get('alamat');
        $user->foto = $request->file('foto')->store('user','public');
        $user->role = $request->get('role');
        $user-> save();

        Alert::success('User Baru Berhasil Ditambahkan');
        return redirect()->route('user.index');
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
        $this->authorize('admin');
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
            'username' => 'required|string|max:20|unique:users,username,'.$id,
            // 'password' => 'min:8|confirmed|nullable',
            'email' => 'required|email|unique:users,email,'.$id,
            'no_hp' => 'string|max:13|required|unique:users,no_hp,'.$id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'role' => 'required'
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
        $user -> password = Hash::make($request->password);
        $user -> username = $request->username;
        $user -> email = $request->email;
        $user -> no_hp = $request->no_hp;
        $user -> tanggal_lahir = $request->tanggal_lahir;
        $user -> alamat = $request->alamat;
        $user -> role = $request->role;
        $user -> save();

        Alert::success('User Berhasil Diupdate');
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
        $this->authorize('admin');
        User::find($id)->delete();
        return redirect()->route('user.index')
            -> with('success', 'User Berhasil Dihapus');
    }
}
