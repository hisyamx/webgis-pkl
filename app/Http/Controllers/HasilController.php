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
    public function index()
    {
        $wilayah = Wilayah::orderBy('nama')->get();
        $hasil = User::hasil()->orderBy('nama')->get();

        return view("admin.hasil.index", ['hasil' => $hasil, 'wilayah' => $wilayah]);
    }

    public function create()
    {
        $wilayah = Wilayah::all();
        $users = User::where('role', '!=', 1)->get();
        if (count($wilayah) <  1) {
            return redirect("wilayah.index")->with("error", "You must create a wilayah before creating an hasil");
        }
        return view("admin.hasil.create", compact(['wilayah', 'users']));
    }

    public function edit($id)
    {
        $hasil = User::findOrFail($id);
        $wilayah = Wilayah::all();
        return view("admin.hasil.edit", ['hasil' => $hasil], ['wilayah' => $wilayah]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_perkebunan' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'role' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'wilayah' => 'required',
            'start' => 'required',
            'finish' => 'nullable',
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


        $user = new User();

        $user->id_perkebunan = $request->id_perkebunan;
        $user->name = $request->name;
        $user->jenis = $request->jenis;
        $user->jumlah = $request->jumlah;
        $user->role = $request->role;
        $user->telephone = $request->telephone;
        $user->address = $request->address;
        $user->wilayah_id = $request->wilayah;
        $user->start = Carbon::make($request->start);
        $user->finish = Carbon::make($request->finish);
        $user->cover_image = $fileNameToStore;

        if ($user->save()) {
            return redirect(route('admin.hasil.index'))->with('success', "hasil Created Successfully");
        }
    }


    public function show($id)
    {
        $hasil = User::findOrFail($id);
        return view("admin.hasil.show", ['hasil' => $hasil]);
    }

    public function destroy($id)
    {
        $hasil = User::findOrFail($id);
        $hasil->delete();

        if ($hasil->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/' . $hasil->cover_image);
        }

        return redirect(route('admin.hasil.index'))->with("success", "hasil Deleted Successfully");
    }

    public function update_record(Request $request, $id)
    {
        $this->validate($request, [
            'id_perkebunan' => 'required',
            'name' => 'required',
            'role' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'wilayah' => 'required',
            'start' => 'required',
            'finish' => 'nullable',
            'cover_image' => 'nullable',
        ]);

        $user = User::findOrFail($id);
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
            Storage::delete('public/cover_images/' . $user->cover_image);
        }

        $user->id_perkebunan = $request->id_perkebunan;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->telephone = $request->telephone;
        $user->address = $request->address;
        $user->wilayah_id = $request->wilayah;
        $user->start = Carbon::make($request->start);
        $user->finish = Carbon::make($request->finish);

        if ($request->hasFile('cover_image')) {
            $user->cover_image = $fileNameToStore;
        }

        $user->save(); //this will UPDATE the record

        return redirect(route('admin.hasil.index'))->with("success", "hasil was updated successfully");
    }
}
