<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pegawai = Pegawai::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('kode_pegawai', 'like', "%{$request->keyword}%")
                ->orWhere('nama', 'like', "%{$request->keyword}%")
                ->orWhere('alamat', 'like', "%{$request->keyword}%")
                ->orWhere('tanggal_lahir', 'like', "%{$request->keyword}%")
                ->orWhere('jabatan', 'like', "%{$request->keyword}%");
        })->orderBy('kode_pegawai')->paginate($pagination);

        return view('pegawai.pegawaiindex', compact('pegawai'))
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
        $request->validate([
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
        $pegawai->foto = $request->file('foto')->store('imagespegawai', 'public');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->kode_pegawai = Helper::KodePegawaiGenerator();

        // if ($request->file('foto')){
        //     $image_name = $request ->file('foto')->store('imagespegawai', 'public');
        // }

        // $pegawai->foto = $image_name;

        $pegawai->save();

        Alert::success('Success', 'Data Pegawai Berhasil Ditambahkan');
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
        return view('pegawai.pegawaidetail', compact('pegawai'));
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
        $pegawai = Pegawai::find($id);
        return view('pegawai.pegawaiedit', compact('pegawai'));
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
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
        ]);
        $pegawai = Pegawai::where('id', $id)->first();
        $pegawai->nama = $request->get('nama');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->jabatan = $request->get('jabatan');

        if ($request->hasFile('foto')) {
            if ($pegawai->foto && file_exists(storage_path('app/public/' . $pegawai->foto))) {
                Storage::delete('public/' . $pegawai->foto);
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
        $this->authorize('admin');
        Pegawai::find($id)->delete();
        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai Berhasil Dihapus');
    }

    public function cetak_pdf_pegawai(){
        $pegawai = Pegawai::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('pegawai.pegawaipdf',['pegawai'=>$pegawai], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
