<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;

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
        $wilayah = Wilayah::orderBy('nama')->get();
        $hasil = Hasil::orderBy('nama')->get();

        return view("admin.hasil.index", ['hasil' => $hasil, 'wilayah' => $wilayah]);
    }

    public function create()
    {
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        $users = Hasil::where('role', '!=', 1)->get();
        if (count($wilayah) <  1) {
            return redirect("wilayah.index")->with("error", "You must create a wilayah before creating an hasil");
        }
        return view("admin.hasil.create", compact(['wilayah', 'perkebunan', 'users']));
    }

    public function edit($id_hasil)
    {
        $hasil = Hasil::findOrFail($id_hasil);
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        return view("admin.hasil.edit", compact(['wilayah', 'perkebunan', 'hasil']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_wilayah' => 'required',
            'id_perkebunan' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'posisi' => 'required',
            // 'alamat' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'nullable',
            'cover_image' => 'nullable',
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $hasil = new Hasil();

        $hasil->id_wilayah = $request->id_wilayah;
        $hasil->id_perkebunan = $request->id_perkebunan;
        $hasil->nama = $request->nama;
        $hasil->jenis = $request->jenis;
        $hasil->jumlah = $request->jumlah;
        $hasil->posisi = $request->posisi;
        // $hasil->alamat = $request->alamat;
        $hasil->deskripsi = $request->deskripsi;
        $hasil->tahun = $request->tahun;
        $hasil->cover_image = $fileNameToStore;

        if ($hasil->save()) {
            return redirect(route('admin.hasil.index'))->with('success', "hasil Created Successfully");
        }
    }


    public function show($id_hasil)
    {
        $hasil = Hasil::findOrFail($id_hasil);
        return view("admin.hasil.show", ['hasil' => $hasil]);
    }

    public function destroy($id_hasil)
    {
        $hasil = Hasil::findOrFail($id_hasil);
        $hasil->delete();

        if ($hasil->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/' . $hasil->cover_image);
        }

        return redirect(route('admin.hasil.index'))->with("success", "hasil Deleted Successfully");
    }

    public function update_record(Request $request, $id_hasil)
    {
        $this->validate($request, [
            'id_wilayah' => 'required',
            'id_perkebunan' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'posisi' => 'required',
            // 'alamat' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'nullable',
            'cover_image' => 'nullable',
        ]);

        $hasil = Hasil::findOrFail($id_hasil);
        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/cover_images/' . $hasil->cover_image);
        }

        $hasil->id_wilayah = $request->id_wilayah;
        $hasil->id_perkebunan = $request->id_perkebunan;
        $hasil->nama = $request->nama;
        $hasil->jenis = $request->jenis;
        $hasil->jumlah = $request->jumlah;
        $hasil->posisi = $request->posisi;
        // $hasil->alamat = $request->alamat;
        $hasil->deskripsi = $request->deskripsi;
        $hasil->tahun = $request->tahun;

        if ($request->hasFile('cover_image')) {
            $hasil->cover_image = $fileNameToStore;
        }

        $hasil->save(); //this will UPDATE the record

        return redirect(route('admin.hasil.index'))->with("success", "hasil was updated successfully");
    }
}
