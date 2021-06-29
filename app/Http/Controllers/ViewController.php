<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;


class ViewController extends Controller
{
    public function __construct()
    {
        $this->View = new View();
    }

    public function index()
    {
        $wilayah_count = Wilayah::all()->count();
        $wilayah = Wilayah::all();
        $perkebunan_count = Perkebunan::all()->count();
        $perkebunan = Perkebunan::all();
        $hasil_count = Hasil::all()->count();
        $hasil = Hasil::all();

        return view('web', compact(['wilayah', 'wilayah_count', 'perkebunan', 'perkebunan_count', 'hasil', 'hasil_count']));
    }

    public function tentang()
    {
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        $hasil = Hasil::all();
        $tentang = Tentang::all();
        return view('tentang', compact(['tentang', 'wilayah', 'perkebunan', 'hasil']));
    }


    public function wilayah($id_wilayah)
    {
        $wilayahfind = Wilayah::findOrFail($id_wilayah);
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        $hasil = Hasil::all();
        return view('wilayah', compact(['wilayah', 'wilayahfind', 'perkebunan', 'hasil']));
    }

    public function perkebunan($id_perkebunan)
    {
        $perkebunanfind = Perkebunan::findOrFail($id_perkebunan);
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        $hasil = Hasil::all();
        return view('perkebunan', compact(['wilayah', 'perkebunanfind', 'perkebunan', 'hasil']));
    }

    public function detailhasil($id_hasil)
    {
        $hasilfind = Hasil::findOrFail($id_hasil);
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        $hasil = Hasil::all();
        return view('detailhasil', compact(['wilayah', 'hasilfind', 'perkebunan', 'hasil']));
    }
}
