<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $wilayah_count = Wilayah::all()->count();
        $wilayah = Wilayah::all();
        $perkebunan_count = Perkebunan::all()->count();
        $perkebunan = Perkebunan::all();
        $hasil_count = Hasil::all()->count();
        $hasil = Hasil::all();

        return view('admin.home', compact(['wilayah', 'wilayah_count', 'perkebunan', 'perkebunan_count', 'hasil', 'hasil_count']));
    }
}
