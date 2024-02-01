<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    // penduduk 
    public function penduduk(){
        $penduduk = DB::table('penduduk')
                        ->join('users', 'penduduk.id', 'users.id_penduduk')
                        ->select('penduduk.*', 'users.status_aktivasi')
                        ->get();
        return view('admin.penduduk', [
            'penduduk' => $penduduk
        ]);
    }

    public function addPenduduk(){
        return view('admin.addPenduduk');
    }

    public function storePenduduk(){
    }

    public function showPenduduk($id){
        $penduduk = DB::table('penduduk')
                        ->join('users', 'penduduk.id', 'users.id_penduduk')
                        ->select('penduduk.*', 'users.*')
                        ->where('penduduk.id', $id)
                        ->get();
        return view('admin.showPenduduk', [
            'penduduk' => $penduduk
        ]);
    }

    public function activePenduduk(){}
    // end penduduk
}
