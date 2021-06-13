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
            'title' => 'Hasil',
            'hasil' => $this->Hasil->AllData(),
        ];
        return view('admin.hasil.v_ index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add hasil',
            'jenjang' => $this->Perkebunan->AllData(),
            'wilayah' => $this->Wilayah->AllData(),
        ];
        return view('admin.hasil.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'nama' => 'required',
                'id' => 'required',
                'status' => 'required',
                'id_wilayah' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'nama_hasil.required' => 'Wajib diisi ',
                'id.required' => 'Wajib diisi ',
                'status.required' => 'Wajib diisi ',
                'id_wilayah.required' => 'Wajib diisi ',
                'alamat.required' => 'Wajib diisi ',
                'posisi.required' => 'Wajib diisi ',
                'deskripsi.required' => 'Wajib diisi ',
                'foto.required' => 'Wajib diisi ',
                'foto.max' => 'Foto Max 1024 KB',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);

        $data = [
            'nama_hasil' => Request()->nama_hasil,
            'id' => Request()->id,
            'status' => Request()->status,
            'id_wilayah' => Request()->id_wilayah,
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
            'jenjang' => $this->Perkebunan->AllData(),
            'wilayah' => $this->Wilayah->AllData(),
        ];
        return view('admin.hasil.v_edit', $data);
    }

    public function update($id_hasil)
    {
        Request()->validate(
            [
                'nama_hasil' => 'required',
                'id' => 'required',
                'status' => 'required',
                'id_wilayah' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
                'foto' => 'max:1024',
            ],
            [
                'nama_hasil.required' => 'Wajib diisi ',
                'id.required' => 'Wajib diisi ',
                'status.required' => 'Wajib diisi ',
                'id_wilayah.required' => 'Wajib diisi ',
                'alamat.required' => 'Wajib diisi ',
                'posisi.required' => 'Wajib diisi ',
                'deskripsi.required' => 'Wajib diisi ',
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
                'nama_hasil' => Request()->nama_hasil,
                'id' => Request()->id,
                'status' => Request()->status,
                'id_wilayah' => Request()->id_wilayah,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi' => Request()->deskripsi,
                'foto' => $filename,
            ];
            $this->Hasil->UpdateData($id_hasil, $data);
        } else {
            //jika tidak ganti foto
            $data = [
                'nama_hasil' => Request()->nama_hasil,
                'id' => Request()->id,
                'status' => Request()->status,
                'id_wilayah' => Request()->id_wilayah,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi' => Request()->deskripsi,
            ];
            $this->Hasil->UpdateData($id_hasil, $data);
        }
        return redirect()->route('hasil')->with('pesan', 'Data Berhasil Di Update.');
    }

    public function delete($id_hasil)
    {
        //hapus icon lama
        $hasil = $this->Hasil->DetailData($id_hasil);
        if ($hasil->foto <> "") {
            unlink(public_path('foto') . '/' . $hasil->foto);
        }
        $this->Hasil->DeleteData($id_hasil);
        return redirect()->route('hasil')->with('pesan', 'Data Berhasil Di Delete.');
    }
}
