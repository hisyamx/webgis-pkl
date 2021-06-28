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
                'nama' => 'required',
                'geojson' => 'required',
                'luas' => 'required',
                'warna' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'geojson.required' => 'Wajib diisi',
                'luas.required' => 'Wajib diisi',
                'warna.required' => 'Wajib diisi',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database

        $data = [
            'nama' => Request()->nama,
            'geojson' => Request()->geojson,
            'luas' => Request()->luas,
            'warna' => Request()->warna,
        ];
        $this->Wilayah->InsertData($data);
        return redirect(route('admin.wilayah.index'))->with('pesan', 'Data Berhasil Di Tambahkan');
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
                'nama' => 'required',
                'geojson' => 'required',
                'luas' => 'required',
                'warna' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'geojson.required' => 'Wajib diisi',
                'luas.required' => 'Wajib diisi',
                'warna.required' => 'Wajib diisi',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database

        $data = [
            'nama' => Request()->wilayah,
            'luas' => Request()->luas,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->Wilayah->UpdateData($id_wilayah, $data);
        return redirect(route('admin.wilayah.index'))->with('pesan', 'Data Berhasil Di Update.');
    }

    public function delete($id_wilayah)
    {
        $this->Wilayah->DeleteData($id_wilayah);
        return redirect(route('admin.wilayah.index'))->with('pesan', 'Data Berhasil Di Delete.');
    }
}
