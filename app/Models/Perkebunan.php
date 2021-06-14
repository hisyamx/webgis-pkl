<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Perkebunan extends Model
{
    // use HasFactory;
    public function AllData()
    {
        return DB::table('perkebunan')
            ->get();
    }

    public function InsertData($data)
    {
        DB::table('perkebunan')
            ->insert($data);
    }

    public function DetailData($id_perkebunan)
    {
        return DB::table('perkebunan')
            ->where('id_perkebunan', $id_perkebunan)->first();
    }

    public function UpdateData($id_perkebunan, $data)
    {
        DB::table('perkebunan')
            ->where('id_perkebunan', $id_perkebunan)
            ->update($data);
    }

    public function DeleteData($id_perkebunan)
    {
        DB::table('perkebunan')
            ->where('id_perkebunan', $id_perkebunan)
            ->delete();
    }
}
