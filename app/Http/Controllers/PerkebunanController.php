<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkebunan;

class PerkebunanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Perkebunan = new Perkebunan();
    }

    public function index()
    {
        $data = [
            'title' => 'Perkebunan',
            'perkebunan' => $this->Perkebunan->AllData(),
        ];
        return view('admin.perkebunan.index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Perkebunan',
        ];
        return view('admin.perkebunan.tambah', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama'   => 'required',
            'luas'   => 'required',
            'ikon'      => 'required|max:1024',
        ], [
            'perkebunan.required' => 'Wajib Diisi',
            'nama.required' => 'Wajib Diisi',
            'ikon.required' => 'Wajib Diisi',
        ]);

        $file = Request()->ikon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('ikon'), $filename);

        $data = [
            'nama' => Request()->nama,
            'luas' => Request()->luas,
            'ikon' => $filename,
        ];
        $this->Perkebunan->InsertData($data);
        return redirect()->route('perkebunan')->with('pesan', 'Data Berhasil Di Simpan.');
    }

    public function edit($id_perkebunan)
    {
        $data = [
            'title' => 'Edit perkebunan',
            'perkebunan' => $this->Perkebunan->DetailData($id_perkebunan),
        ];
        return view('admin.perkebunan.edit', $data);
    }

    public function update($id_perkebunan)
    {
        Request()->validate([
            'nama'   => 'required',
            'luas'   => 'required',
        ], [
            'nama.required' => 'Wajib Diisi',
            'luas.required' => 'Wajib Diisi',
        ]);

        if (Request()->ikon <> "") {
            //hapus ikon lama
            $perkebunan = $this->Perkebunan->DetailData($id_perkebunan);
            if ($perkebunan->ikon <> "") {
                unlink(public_path('ikon') . '/' . $perkebunan->ikon);
            }
            //jika ingin ganti ikon
            $file = Request()->ikon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('ikon'), $filename);
            $data = [
                'nama' => Request()->nama,
                'luas' => Request()->luas,
                'ikon' => $filename,
            ];
            $this->Perkebunan->UpdateData($id_perkebunan, $data);
        } else {
            //jika tidak ganti ikon
            $data = [
                'nama' => Request()->nama,
                'luas' => Request()->luas,
            ];
            $this->Perkebunan->UpdateData($id_perkebunan, $data);
        }
        return redirect()->route('perkebunan')->with('pesan', 'Data Berhasil Di Update.');
    }

    public function delete($id_perkebunan)
    {
        //hapus ikon lama
        $perkebunan = $this->Perkebunan->DetailData($id_perkebunan);
        if ($perkebunan->ikon <> "") {
            unlink(public_path('ikon') . '/' . $perkebunan->ikon);
        }

        $this->Perkebunan->DeleteData($id_perkebunan);
        return redirect()->route('perkebunan')->with('pesan', 'Data Berhasil Di Delete.');
    }
}
