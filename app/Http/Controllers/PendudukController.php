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

    // pengajuan kk
    public function pengajuanKk(){
        return view('penduduk.pengajuanKk', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanKk(){
        return view('penduduk.addPengajuanKk', [
            'title' => 'Pengajuan'
        ]);
    }

    // pengajuan akta kelahiran
    public function pengajuanAktaKelahiran(){
        return view('penduduk.pengajuanAktaKelahiran', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanAktaKelahiran(){
        return view('penduduk.addPengajuanAktaKelahiran', [
            'title' => 'Pengajuan'
        ]);
    }

    // pengajuan akta kematian
    public function pengajuanAktaKematian(){
        return view('penduduk.pengajuanAktaKematian', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanAktaKematian(){
        return view('penduduk.addPengajuanAktaKematian', [
            'title' => 'Pengajuan'
        ]);
    }
}
