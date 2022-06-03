<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pegawai = Pegawai::paginate(5);
        $posts = Pegawai::orderBy('nama', 'asc')->paginate(5);
        return view('pegawai.pegawaiindex', compact('pegawai'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.pegawaicreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama' => 'required',
            'foto' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
            // 'kode_pegawai' => 'required',
        ]);

        // Pegawai::create($request->all());
        $pegawai = new Pegawai;
        $pegawai->nama = $request->get('nama');
        $pegawai->foto = $request->file('foto')->store('imagespegawai','public');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->kode_pegawai = Helper::KodePegawaiGenerator();

        // if ($request->file('foto')){
        //     $image_name = $request ->file('foto')->store('imagespegawai', 'public');
        // }

        // $pegawai->foto = $image_name;

        $pegawai->save();
        
        Alert::success('Success','Data Pegawai Berhasil Ditambahkan');
        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.pegawaidetail',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.pegawaiedit',compact('pegawai'));
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
            'nama' => 'required',
            'foto' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
            // 'kode_pegawai' => 'required',
        ]);
        $pegawai = Pegawai::where('id', $id)->first();
        $pegawai->nama = $request->get('nama');
        $image_name = $request->file('foto')->store('imagespegawai', 'public');
        $pegawai->foto = $image_name;
        $pegawai->alamat = $request->get('alamat');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->jabatan = $request->get('jabatan');

        if($request->hasFile('foto')){
            if($pegawai->foto_pegawai && file_exists(storage_path('app/public/'. $pegawai->foto))){
                Storage::delete('public/'.$pegawai->foto);
            }
            $image_name = $request->file('foto')->store('imagespegawai', 'public');
            $pegawai->foto = $image_name;
        }
        $pegawai->save();

        // Pegawai::find($id)->update($request->all());
        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        return redirect()->route('pegawai.index')
            -> with('success', 'Pegawai Berhasil Dihapus');
    }
}