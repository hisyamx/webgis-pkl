<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PerkebunanController extends Controller
{
    public function index()
    {
        $perkebunan = Perkebunan::orderBy('nama')->get();

        return view("admin.perkebunan.index", ['perkebunan' => $perkebunan]);
    }

    public function create()
    {
        $perkebunan = Perkebunan::all();
        $users = User::where('role', '!=', 1)->get();
        return view("admin.perkebunan.create", compact(['perkebunan', 'users']));
    }

    public function edit($id_perkebunan)
    {
        $perkebunan = Perkebunan::findOrFail($id_perkebunan);
        return view("admin.perkebunan.edit", ['perkebunan' => $perkebunan]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'cover_image' => 'nullable'
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

        $perkebunan = new Perkebunan();
        $perkebunan->nama = $request->nama;
        $perkebunan->cover_image = $fileNameToStore;

        if ($perkebunan->save()) {
            return redirect(route('admin.perkebunan.index'))->with('success', "perkebunan Created Successfully");
        }
    }


    public function show($id_perkebunan)
    {
        $perkebunan = Perkebunan::findOrFail($id_perkebunan);
        return view("admin.perkebunan.show", ['perkebunan' => $perkebunan]);
    }

    public function destroy($id_perkebunan)
    {
        $perkebunan = Perkebunan::findOrFail($id_perkebunan);
        $perkebunan->delete();

        if ($perkebunan->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/' . $perkebunan->cover_image);
        }

        return redirect(route('admin.perkebunan.index'))->with("success", "perkebunan Deleted Successfully");
    }

    public function update_record(Request $request, $id_perkebunan)
    {
        $this->validate($request, [
            'nama' => 'required',
            'cover_image' => 'nullable'
        ]);

        $perkebunan = Perkebunan::findOrFail($id_perkebunan);

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
            Storage::delete('public/cover_images/' . $perkebunan->cover_image);
        }

        $perkebunan->nama = $request->nama;

        if ($request->hasFile('cover_image')) {
            $perkebunan->cover_image = $fileNameToStore;
        }

        $perkebunan->save(); //this will UPDATE the record

        return redirect(route('admin.perkebunan.index'))->with("success", "perkebunan was updated successfully");
    }
}
