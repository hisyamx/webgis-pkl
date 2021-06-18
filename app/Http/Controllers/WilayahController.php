<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    public function __construct()
    {
        $this->Wilayah = new Wilayah();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Wilayah',
            'wilayah' => $this->Wilayah->AllData(),
        ];
        return view('admin.wilayah.index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Data Wilayah',
        ];
        return view('admin.wilayah.add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'wilayah' => 'required',
                'warna' => 'required',
                'luas' => 'required',
                'geojson' => 'required',
            ],
            [
                'wilayah.required' => 'Wajib diisi',
                'warna.required' => 'Wajib diisi',
                'luas.required' => 'Wajib diisi',
                'geojson.required' => 'Wajib diisi',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database

        $data = [
            'wilayah' => Request()->wilayah,
            'warna' => Request()->warna,
            'luas' => Request()->luas,
            'geojson' => Request()->geojson,
        ];
        $this->Wilayah->InsertData($data);
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id_wilayah)
    {
        $data = [
            'title' => 'edit Data wilayah',
            'wilayah' => $this->Wilayah->DetailData($id_wilayah),
        ];
        return view('admin.wilayah.edit', $data);
    }

    public function update($id_wilayah)
    {
        Request()->validate(
            [
                'wilayah' => 'required',
                'warna' => 'required',
                'luas' => 'required',
                'geojson' => 'required',
            ],
            [
                'wilayah.required' => 'Wajib diisi',
                'warna.required' => 'Wajib diisi',
                'luas.required' => 'Wajib diisi',
                'geojson.required' => 'Wajib diisi',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database

        $data = [
            'wilayah' => Request()->wilayah,
            'warna' => Request()->warna,
            'luas' => Request()->warna,
            'geojson' => Request()->geojson,
        ];
        $this->Wilayah->UpdateData($id_wilayah, $data);
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil Di Update.');
    }

    public function delete($id_wilayah)
    {
        $this->Wilayah->DeleteData($id_wilayah);
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil Di Delete.');
    }
}
