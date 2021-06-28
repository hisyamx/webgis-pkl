<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

class Home extends Model
{
    // use HasFactory;
    public function DataWilayah()
    {
        return DB::table('wilayah')
            ->get();
    }

    public function DataPerkebunan()
    {
        return DB::table('perkebunan')
            ->get();
    }

    public function DetailPerkebunan($id_perkebunan)
    {
        return DB::table('perkebunan')
            ->where('id_perkebunan', $id_perkebunan)->first();
    }

    public function DataHasilPerkebunan($id_perkebunan)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id_perkebunan', '=', 'hasil.id_perkebunan')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'hasil.id_wilayah')
            ->where('hasil.id_hasil', $id_perkebunan)
            ->get();
    }

    public function DetailWilayah($id_wilayah)
    {
        return DB::table('wilayah')
            ->where('id_wilayah', $id_wilayah)->first();
    }

    public function DataHasil($id_wilayah)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id_perkebunan', '=', 'hasil.id_perkebunan')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'hasil.id_wilayah')
            ->where('hasil.id', $id_wilayah)
            ->get();
    }

    public function AllDataHasil()
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id_perkebunan', '=', 'hasil.id_perkebunan')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'hasil.id_wilayah')
            ->get();
    }

    public function DetailDataHasil($id_hasil)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id_perkebunan', '=', 'hasil.id_perkebunan')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'hasil.id_wilayah')
            ->where('id', $id_hasil)
            ->first();
    }
}
