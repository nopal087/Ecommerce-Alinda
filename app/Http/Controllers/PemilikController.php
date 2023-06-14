<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function pengguna()
    {
        $pengguna = User::latest()->get();
        return view('admin.pemilik.pengguna', compact('pengguna'));
    }
}
