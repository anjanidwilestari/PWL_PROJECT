<?php

namespace App\Http\Controllers;

use App\Models\GetInTouch;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GetInTouchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('klien.contact', ['title' => 'Hubungi Kami']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klien.contact', ['title' => 'Hubungi Kami']);
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
            'no_hp' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ]);

        $getintouch = new GetInTouch();
        $getintouch->nama = $request->get('nama');
        $getintouch->no_hp = $request->get('no_hp');
        $getintouch->email = $request->get('email');
        $getintouch->pesan = $request->get('pesan');

        $getintouch->save();
        
        Alert::success('Success', 'Terima Kasih Telah Memberikan Masukan');
        return view('klien.home', ['title' => 'Beranda']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
