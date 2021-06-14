<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class wilayah extends Model
{
    // use HasFactory;
    public function AllData()
    {
        return DB::table('wilayah')
            ->get();
    }

    public function InsertData($data)
    {
        DB::table('wilayah')
            ->insert($data);
    }

    public function DetailData($id_wilayah)
    {
        return DB::table('wilayah')
            ->where('id_wilayah', $id_wilayah)->first();
    }

    public function UpdateData($id_wilayah, $data)
    {
        DB::table('wilayah')
            ->where('id_wilayah', $id_wilayah)
            ->update($data);
    }

    public function DeleteData($id_wilayah)
    {
        DB::table('wilayah')
            ->where('id_wilayah', $id_wilayah)
            ->delete();
    }
}
