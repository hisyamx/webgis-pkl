<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wilayah extends Model
{
    // use HasFactory;
    public function AllData()
    {
        return DB::table('wilayahs')
            ->get();
    }

    public function InsertData($data)
    {
        DB::table('wilayahs')
            ->insert($data);
    }

    public function DetailData($id_wilayah)
    {
        return DB::table('wilayahs')
            ->where('id_wilayah', $id_wilayah)->first();
    }

    public function UpdateData($id_wilayah, $data)
    {
        DB::table('wilayahs')
            ->where('id_wilayah', $id_wilayah)
            ->update($data);
    }

    public function DeleteData($id_wilayah)
    {
        DB::table('wilayahs')
            ->where('id_wilayah', $id_wilayah)
            ->delete();
    }
}
