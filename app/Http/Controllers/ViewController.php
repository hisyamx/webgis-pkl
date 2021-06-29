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

    public function wilayah($id)
    {
        $wilayah = $this->View->DetailWilayah($id);
        $data = [
            'title' => 'Wilayah ' . $wilayah->wilayah,
            'wilayah' => $this->View->DataWilayah(),
            'hasil' => $this->View->DataHasil($id),
            'perkebunan' => $this->View->DataPerkebunan()
        ];
        return view('wilayah', $data);
    }

    public function perkebunan($id)
    {
        $perkebunan = $this->View->DetailPerkebunan($id);
        $data = [
            'title' => 'Perkebunan ' . $perkebunan->perkebunan,
            'wilayah' => $this->View->DataWilayah(),
            'hasil' => $this->View->DataHasilPerkebunan($id),
            'perkebunan' => $this->View->DataPerkebunan(),
        ];
        return view('wilayah', $data);
    }

    public function detailhasil($id)
    {
        $hasil = $this->View->DetailDataHasil($id);
        $data = [
            'title' => 'Detail ' . $hasil->nama_hasil,
            'wilayah' => $this->View->DataKecamatan(),
            'perkebunan' => $this->View->DataJenjang(),
            'hasil' => $hasil,
        ];
        return view('detailhasil', $data);
    }
}
