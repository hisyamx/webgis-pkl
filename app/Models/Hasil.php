<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hasil extends Model
{
    // use HasFactory;
    public function AllData()
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id', '=', 'hasil.id')
            ->join('wilayah', 'wilayah.id', '=', 'hasil.id')
            ->get();
    }

    public function InsertData($data)
    {
        DB::table('hasil')
            ->insert($data);
    }

    public function DetailData($id)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id', '=', 'hasil.id')
            ->join('wilayah', 'wilayah.id', '=', 'hasil.id')
            ->where('id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        DB::table('hasil')
            ->where('id', $id)
            ->update($data);
    }

    public function DeleteData($id)
    {
        DB::table('hasil')
            ->where('id', $id)
            ->delete();
    }
}
