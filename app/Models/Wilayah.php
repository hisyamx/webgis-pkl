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

    public function DetailData($id)
    {
        return DB::table('wilayah')
            ->where('id_kecamatan', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        DB::table('wilayah')
            ->where('id_kecamatan', $id)
            ->update($data);
    }

    public function DeleteData($id)
    {
        DB::table('wilayah')
            ->where('id_kecamatan', $id)
            ->delete();
    }
}
