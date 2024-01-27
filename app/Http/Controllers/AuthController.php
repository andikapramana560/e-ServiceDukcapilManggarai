<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function form()
    {
        return view('admin.form');
    }

    public function datatable()
    {
        return view('admin.datatable');
    }
}
