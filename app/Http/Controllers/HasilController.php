<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\wilayah;
use App\Models\Perkebunan;


class HasilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Hasil = new Hasil();
        $this->Perkebunan = new Perkebunan();
        $this->Wilayah = new Wilayah();
    }

    public function index()
    {
        $data = [
            'nama' => 'hasil',
            'hasil' => $this->Hasil->AllData(),
        ];
        return view('admin.hasil.index', $data);
    }

    public function add()
    {
        $data = [
            'nama' => 'Add Hasil',
            'perkebunan' => $this->Perkebunan->AllData(),
            'wilayah' => $this->Wilayah->AllData(),
        ];
        return view('admin.hasil.add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'nama' => 'required',
                'id_jenjang' => 'required',
                'status' => 'required',
                'id_kecamatan' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'nama.required' => 'Wajib diisi !!!',
                'id_jenjang.required' => 'Wajib diisi !!!',
                'status.required' => 'Wajib diisi !!!',
                'id_kecamatan.required' => 'Wajib diisi !!!',
                'alamat.required' => 'Wajib diisi !!!',
                'posisi.required' => 'Wajib diisi !!!',
                'deskripsi.required' => 'Wajib diisi !!!',
                'foto.required' => 'Wajib diisi !!!',
                'foto.max' => 'Foto Max 1024 KB',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);

        $data = [
            'nama' => Request()->nama,
            'id_jenjang' => Request()->id_jenjang,
            'status' => Request()->status,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'posisi' => Request()->posisi,
            'deskripsi' => Request()->deskripsi,
            'foto' => $filename,
        ];
        $this->Hasil->InsertData($data);
        return redirect()->route('hasil')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id_hasil)
    {
        $data = [
            'title' => 'Edit hasil',
            'hasil'   => $this->Hasil->DetailData($id_hasil),
            'jenjang' => $this->JenjangModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.hasil.v_edit', $data);
    }

    public function update($id_hasil)
    {
        Request()->validate(
            [
                'nama' => 'required',
                'id_jenjang' => 'required',
                'status' => 'required',
                'id_kecamatan' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
                'foto' => 'max:1024',
            ],
            [
                'nama.required' => 'Wajib diisi !!!',
                'id_jenjang.required' => 'Wajib diisi !!!',
                'status.required' => 'Wajib diisi !!!',
                'id_kecamatan.required' => 'Wajib diisi !!!',
                'alamat.required' => 'Wajib diisi !!!',
                'posisi.required' => 'Wajib diisi !!!',
                'deskripsi.required' => 'Wajib diisi !!!',
                'foto.max' => 'Foto Max 1024 KB',
            ]
        );

        if (Request()->foto <> "") {
            //hapus foto lama
            $hasil = $this->Hasil->DetailData($id_hasil);
            if ($hasil->foto <> "") {
                unlink(public_path('foto') . '/' . $hasil->foto);
            }
            //jika ingin ganti icon
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);

            $data = [
                'nama' => Request()->nama,
                'id_jenjang' => Request()->id_jenjang,
                'status' => Request()->status,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi' => Request()->deskripsi,
                'foto' => $filename,
            ];
            $this->Hasil->UpdateData($id_hasil, $data);
        } else {
            //jika tidak ganti foto
            $data = [
                'nama' => Request()->nama,
                'id_jenjang' => Request()->id_jenjang,
                'status' => Request()->status,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi' => Request()->deskripsi,
            ];
            $this->Hasil->UpdateData($id_hasil, $data);
        }
        return redirect()->route('hasil')->with('pesan', 'Data Berhasil Di Update.!!!');
    }

    public function delete($id_hasil)
    {
        //hapus icon lama
        $hasil = $this->Hasil->DetailData($id_hasil);
        if ($hasil->foto <> "") {
            unlink(public_path('foto') . '/' . $hasil->foto);
        }
        $this->Hasil->DeleteData($id_hasil);
        return redirect()->route('hasil')->with('pesan', 'Data Berhasil Di Delete.!!!');
    }
}
