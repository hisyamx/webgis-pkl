<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::orderBy('nama')->get();
        $hasil = Hasil::orderBy('nama')->get();

        return view("admin.profile.index", ['hasil' => $hasil, 'wilayah' => $wilayah]);
    }

    public function create()
    {
        $wilayah = Wilayah::all();
        $perkebunan = Perkebunan::all();
        $users = User::where('role', '!=', 1)->get();
        if (count($wilayah) <  1) {
            return redirect("wilayah.index")->with("error", "You must create a wilayah before creating an hasil");
        }
        return view("admin.profile.create", compact(['wilayah', 'perkebunan', 'users']));
    }

    public function edit($id)
    {
        $hasil = Hasil::findOrFail($id);
        $wilayah = Wilayah::all();
        return view("admin.profile.edit", ['hasil' => $hasil], ['wilayah' => $wilayah]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_hasil' => 'required',
            'id_wilayah' => 'required',
            'id_perkebunan' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'posisi' => 'required',
            'alamat' => 'required',
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

        $hasil->id_hasil = $request->id_hasil;
        $hasil->id_wilayah = $request->id_wilayah;
        $hasil->id_perkebunan = $request->id_perkebunan;
        $hasil->nama = $request->nama;
        $hasil->jenis = $request->jenis;
        $hasil->jumlah = $request->jumlah;
        $hasil->posisi = $request->posisi;
        $hasil->alamat = $request->alamat;
        $hasil->deskripsi = $request->deskripsi;
        $hasil->tahun = Carbon::make($request->tahun);
        $hasil->cover_image = $fileNameToStore;

        if ($hasil->save()) {
            return redirect(route('admin.profile.index'))->with('success', "hasil Created Successfully");
        }
    }


    public function show($id)
    {
        $hasil = User::findOrFail($id);
        return view("admin.profile.show", ['hasil' => $hasil]);
    }

    public function destroy($id)
    {
        $hasil = User::findOrFail($id);
        $hasil->delete();

        if ($hasil->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/' . $hasil->cover_image);
        }

        return redirect(route('admin.profile.index'))->with("success", "hasil Deleted Successfully");
    }

    public function update_record(Request $request, $id)
    {
        $this->validate($request, [
            'id_hasil' => 'required',
            'id_wilayah' => 'required',
            'id_perkebunan' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'posisi' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'nullable',
            'cover_image' => 'nullable',
        ]);

        $hasil = Hasil::findOrFail($id);
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

        $hasil->id_hasil = $request->id_hasil;
        $hasil->id_wilayah = $request->id_wilayah;
        $hasil->id_perkebunan = $request->id_perkebunan;
        $hasil->nama = $request->nama;
        $hasil->jenis = $request->jenis;
        $hasil->jumlah = $request->jumlah;
        $hasil->posisi = $request->posisi;
        $hasil->alamat = $request->alamat;
        $hasil->deskripsi = $request->deskripsi;
        $hasil->tahun = Carbon::make($request->tahun);
        $hasil->cover_image = $fileNameToStore;

        if ($request->hasFile('cover_image')) {
            $hasil->cover_image = $fileNameToStore;
        }

        $hasil->save(); //this will UPDATE the record

        return redirect(route('admin.profile.index'))->with("success", "hasil was updated successfully");
    }
}
