<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\View;

class ViewController extends Controller
{
    public function __construct()
    {
        $this->View = new View();
    }

    public function index()
    {
        $data = [
            'title' => 'Pemetaan',
            'wilayah' => $this->View->DataWilayah(),
            'hasil' => $this->View->AllDataHasil(),
            'perkebunan' => $this->View->DataPerkebunan(),
        ];
        return view('view', $data);
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
            'title' => 'perkebunan ' . $perkebunan->perkebunan,
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
