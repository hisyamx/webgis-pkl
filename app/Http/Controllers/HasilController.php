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
        return view('admin.hasil.index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add hasil',
            'jenjang' => $this->Perkebunan->AllData(),
            'wilayah' => $this->Wilayah->AllData(),
        ];
        return view('admin.hasil.tambah', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'nama' => 'required',
                'id_hasil' => 'required',
                'id_perkebunan' => 'required',
                'id_wilayah' => 'required',
                'jenis' => 'required',
                'jumlah' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'tahun' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'id_hasil.required' => 'Wajib diisi',
                'id_perkebunan.required' => 'Wajib diisi',
                'id_wilayah.required' => 'Wajib diisi',
                'jenis.required' => 'Wajib diisi',
                'jumlah.required' => 'Wajib diisi',
                'alamat.required' => 'Wajib diisi',
                'posisi.required' => 'Wajib diisi',
                'tahun.required' => 'Wajib diisi',
                'deskripsi.required' => 'Wajib diisi',
                'foto.required' => 'Wajib diisi',
                'foto.max' => 'Foto Max 1024 KB',
            ]
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);

        $data = [
            'nama' => Request()->nama,
            'id_hasil' => Request()->id_hasil,
            'id_perkebunan' => Request()->id_perkebunan,
            'id_wilayah' => Request()->id_wilayah,
            'jenis' => Request()->jenis,
            'jumlah' => Request()->jumlah,
            'alamat' => Request()->alamat,
            'posisi' => Request()->posisi,
            'tahun' => Request()->tahun,
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
            'perkebunan' => $this->Perkebunan->AllData(),
            'wilayah' => $this->Wilayah->AllData(),
        ];
        return view('admin.hasil.edit', $data);
    }

    public function update($id_hasil)
    {
        Request()->validate(
            [
                'nama' => 'required',
                'id_hasil' => 'required',
                'id_perkebunan' => 'required',
                'id_wilayah' => 'required',
                'jenis' => 'required',
                'jumlah' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'tahun' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'id_hasil.required' => 'Wajib diisi',
                'id_perkebunan.required' => 'Wajib diisi',
                'id_wilayah.required' => 'Wajib diisi',
                'jenis.required' => 'Wajib diisi',
                'jumlah.required' => 'Wajib diisi',
                'alamat.required' => 'Wajib diisi',
                'posisi.required' => 'Wajib diisi',
                'tahun.required' => 'Wajib diisi',
                'deskripsi.required' => 'Wajib diisi',
                'foto.required' => 'Wajib diisi',
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
                'id_hasil' => Request()->id_hasil,
                'id_perkebunan' => Request()->id_perkebunan,
                'id_wilayah' => Request()->id_wilayah,
                'jenis' => Request()->jenis,
                'jumlah' => Request()->jumlah,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'tahun' => Request()->tahun,
                'deskripsi' => Request()->deskripsi,
                'foto' => $filename,
            ];
            $this->Hasil->UpdateData($id_hasil, $data);
        } else {
            //jika tidak ganti foto
            $data = [
                'nama' => Request()->nama,
                'id_hasil' => Request()->id_hasil,
                'id_perkebunan' => Request()->id_perkebunan,
                'id_wilayah' => Request()->id_wilayah,
                'jenis' => Request()->jenis,
                'jumlah' => Request()->jumlah,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'tahun' => Request()->tahun,
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
