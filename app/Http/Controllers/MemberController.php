<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $member = Member::paginate(5);
        $posts = Member::orderBy('nama', 'asc')->paginate(5);
        return view('member.memberindex', compact('member'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.membercreate');
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
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
            'tanggal_lahir' => 'required',
            'ktp' => 'required',
        ]);

        $member = new Member;
        $member->nama = $request->get('nama');
        $member->ktp = $request->file('ktp')->store('imagesmember','public');
        if ($request->file('kartu_pelajar') == null) {
            $member->kartu_pelajar = "Tidak ada";
        }else{
           $member->kartu_pelajar = $request->file('kartu_pelajar')->store('imagesmember','public');  
        }
        $member->no_hp = $request->get('no_hp');
        $member->alamat = $request->get('alamat');
        $member->tanggal_lahir = $request->get('tanggal_lahir');
        $member->kode_member = Helper::KodeMemberGenerator();

        $member->save();
        
        Alert::success('Success','Data Member Berhasil Ditambahkan');
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('member.memberdetail',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.memberedit',compact('member'));
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
            'no_hp' => 'required|max:13',
            'tanggal_lahir' => 'required',
        ]);
        $member = Member::where('id', $id)->first();
        $member->nama = $request->get('nama');
        $member->no_hp = $request->get('no_hp');
        $member->alamat = $request->get('alamat');
        $member->tanggal_lahir = $request->get('tanggal_lahir');

        if($request->hasFile('ktp')){
            if($member->ktp && file_exists(storage_path('app/public/'. $member->ktp))){
                Storage::delete('public/'.$member->ktp);
            }
            $image_name = $request->file('ktp')->store('imagesmember', 'public');
            $member->ktp = $image_name;
        }
        if($request->hasFile('kartu_pelajar')){
            if($member->kartu_pelajar && file_exists(storage_path('app/public/'. $member->kartu_pelajar))){
                Storage::delete('public/'.$member->kartu_pelajar);
            }
            $image_name = $request->file('kartu_pelajar')->store('imagesmember', 'public');
            $member->kartu_pelajar = $image_name;
        }
        $member->save();

        return redirect()->route('member.index')
        ->with('success', 'Data Member Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect()->route('member.index')
            -> with('success', 'Member Berhasil Dihapus');
    }
}
