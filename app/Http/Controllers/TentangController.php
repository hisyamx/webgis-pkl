<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hasil;
use App\Models\Perkebunan;
use App\Models\Wilayah;
use App\Models\Tentang;
use App\Models\User;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tentang = Tentang::all();
        return view("admin.tentang.index", ['tentang' => $tentang]);
    }
    public function create()
    {
        $tentang = Tentang::all();
        $user = User::where('role', '!=', 1)->get();
        return view("admin.tentang.create", compact(['user', 'tentang']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required'
        ]);

        // dd("in");
        $tentang = new Tentang();

        $tentang->deskripsi = request('deskripsi');

        $tentang->save();

        return redirect(route("admin.tentang.index"))->with("success", "Tentang Created Successfully");
    }

    public function show($id)
    {
        $tentang = Tentang::findOrFail($id);
        return view("admin.tentang.show", compact('tentang'));
    }

    public function destroy($id)
    {
        $tentang = Tentang::findOrFail($id);
        $tentang->delete();

        return redirect(route('admin.hasil.index'))->with("success", "Tentang Deleted Successfully");
    }

    public function edit($id)
    {
        $tentang = Tentang::findOrFail($id);
        return view("admin.tentang.edit", compact('tentang'));
    }

    public function update_record($id)
    {
        $tentang = Tentang::findOrFail($id);

        $tentang->deskripsi = request('deskripsi');

        $tentang->save(); //this will UPDATE the record with id=1

        return redirect(route("admin.tentang.index"))->with("success", "Tentang Updated Successfully");
    }
}
