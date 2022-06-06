<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Pegawai;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $member = Member::count();
        $pegawai = Pegawai::count();

        return view('admin.dashboard', compact('member', 'pegawai'));
    }
}
