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

    public function DetailData($id)
    {
        return DB::table('perkebunan')
            ->where('id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        DB::table('perkebunan')
            ->where('id', $id)
            ->update($data);
    }

    public function DeleteData($id)
    {
        DB::table('perkebunan')
            ->where('id', $id)
            ->delete();
    }
}
