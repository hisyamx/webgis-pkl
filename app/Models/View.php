<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class View extends Model
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

    public function DetailPerkebunan($id)
    {
        return DB::table('perkebunan')
            ->where('id', $id)->first();
    }

    public function DataHasilPerkebunan($id)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id', '=', 'hasil.id')
            ->join('wilayah', 'wilayah.id', '=', 'hasil.id')
            ->where('hasil.id', $id)
            ->get();
    }

    public function DetailWilayah($id)
    {
        return DB::table('wilayah')
            ->where('id', $id)->first();
    }

    public function DataHasil($id)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id', '=', 'hasil.id')
            ->join('wilayah', 'wilayah.id', '=', 'hasil.id')
            ->where('hasil.id', $id)
            ->get();
    }

    public function AllDataHasil()
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id', '=', 'hasil.id')
            ->join('wilayah', 'wilayah.id', '=', 'hasil.id')
            ->get();
    }

    public function DetailDataHasil($id)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id', '=', 'hasil.id')
            ->join('wilayah', 'wilayah.id', '=', 'hasil.id')
            ->where('id', $id)
            ->first();
    }
}
