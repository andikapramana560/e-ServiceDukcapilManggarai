<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(){
        return view('penduduk.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    // pengajuan ktp
    public function pengajuanKtp(){
        return view('penduduk.pengajuanKtp', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanktp(){
        return view('penduduk.addPengajuanKtp', [
            'title' => 'Pengajuan'
        ]);
    }
}
