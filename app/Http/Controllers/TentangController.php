<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->tentang = new Tentang();
    }

    public function index()
    {
        return view('admin.tentang.index');
    }

    public function add()
    {
        $data = [
            'title' => 'Add tentang',
        ];
        return view('admin.tentang.tambah', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
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
            'deskripsi' => Request()->deskripsi,
            'foto' => $filename,
        ];
        $this->tentang->InsertData($data);
        return redirect()->route('tentang')->with('pesan', 'Data Bertentang Di Tambahkan');
    }

    public function edit($id_tentang)
    {
        $data = [
            'title' => 'Edit tentang',
            'tentang'   => $this->tentang->DetailData($id_tentang),
        ];
        return view('admin.tentang.edit', $data);
    }

    public function update($id_tentang)
    {
        Request()->validate(
            [
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'deskripsi.required' => 'Wajib diisi',
                'foto.required' => 'Wajib diisi',
                'foto.max' => 'Foto Max 1024 KB',
            ]
        );

        if (Request()->foto <> "") {
            //hapus foto lama
            $tentang = $this->tentang->DetailData($id_tentang);
            if ($tentang->foto <> "") {
                unlink(public_path('foto') . '/' . $tentang->foto);
            }
            //jika ingin ganti icon
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);

            $data = [
                'deskripsi' => Request()->deskripsi,
                'foto' => $filename,
            ];
            $this->tentang->UpdateData($id_tentang, $data);
        } else {
            //jika tidak ganti foto
            $data = [
                'tahun' => Request()->tahun,
                'deskripsi' => Request()->deskripsi,
            ];
            $this->tentang->UpdateData($id_tentang, $data);
        }
        return redirect()->route('tentang')->with('pesan', 'Data Bertentang Di Update.');
    }

    public function delete($id_tentang)
    {
        //hapus icon lama
        $tentang = $this->tentang->DetailData($id_tentang);
        if ($tentang->foto <> "") {
            unlink(public_path('foto') . '/' . $tentang->foto);
        }
        $this->tentang->DeleteData($id_tentang);
        return redirect()->route('tentang')->with('pesan', 'Data Bertentang Di Delete.');
    }
}
