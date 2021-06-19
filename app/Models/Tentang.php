<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tentang extends Model
{
    use HasFactory;
    // use HasFactory;
    public function AllData()
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id_perkebunan', '=', 'hasil.id_perkebunan')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'hasil.id_wilayah')
            ->get();
    }

    public function InsertData($data)
    {
        DB::table('hasil')
            ->insert($data);
    }

    public function DetailData($id_hasil)
    {
        return DB::table('hasil')
            ->join('perkebunan', 'perkebunan.id_perkebunan', '=', 'hasil.id_perkebunan')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'hasil.id_wilayah')
            ->where('id_hasil', $id_hasil)->first();
    }

    public function UpdateData($id_hasil, $data)
    {
        DB::table('hasil')
            ->where('id_hasil', $id_hasil)
            ->update($data);
    }

    public function DeleteData($id_hasil)
    {
        DB::table('hasil')
            ->where('id_hasil', $id_hasil)
            ->delete();
    }
}
