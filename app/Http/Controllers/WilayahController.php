<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;

class WilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $wilayah = Wilayah::orderBy('nama')->paginate(10);
        return view("admin.wilayah.index", ['wilayah' => $wilayah]);
    }
    public function create()
    {
        $user = User::where('role', '!=', 1)->get();
        return view("admin.wilayah.create", compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'geojson' => 'required',
            'luas' => 'required',
            'warna' => 'required'
        ]);

        // dd("in");
        $wilayah = new Wilayah();

        $wilayah->nama = request('nama');
        $wilayah->geojson = request('geojson');
        $wilayah->luas = request('luas');
        $wilayah->warna = request('warna');

        $wilayah->save();

        return redirect(route("admin.wilayah.index"))->with("success", "wilayah Created Successfully");
    }

    public function show($id_wilayah)
    {
        $wilayah = Wilayah::findOrFail($id_wilayah);
        return view("admin.wilayah.show", compact('wilayah'));
    }

    public function destroy($id_wilayah)
    {
        $wilayah = Wilayah::findOrFail($id_wilayah);
        $wilayah->delete();

        return redirect("admin.wilayah.index")->with("success", "wilayah Deleted Successfully");
    }

    public function edit($id_wilayah)
    {
        $wilayah = Wilayah::findOrFail($id_wilayah);
        return view("admin.wilayah.edit", compact('wilayah'));
    }

    public function update_record($id_wilayah)
    {
        $wilayah = Wilayah::findOrFail($id_wilayah);

        $wilayah->nama = request('nama');
        $wilayah->geojson = request('geojson');
        $wilayah->luas = request('luas');
        $wilayah->warna = request('warna');

        $wilayah->save(); //this will UPDATE the record with id=1

        return redirect(route("admin.wilayah.index"))->with("success", "wilayah Updated Successfully");
    }
}
