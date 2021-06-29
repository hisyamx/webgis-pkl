<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public function DataWilayah()
    {
        return $this->hasOne(Wilayah::class);
    }

    public function DataPerkebunan()
    {
        return $this->hasOne(Perkebunan::class);
    }

    public function DetailPerkebunan($id_perkebunan)
    {
        return $this->hasOne(Perkebunan::class, 'id_perkebunan');
    }

    public function DataHasilPerkebunan($id_perkebunan)
    {
        return $this->hasMany(Hasil::class, 'id_perkebunan');
        return DB::table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_perkebunan', '=', 'tbl_sekolah.id_perkebunan')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->where('tbl_sekolah.id_perkebunan', $id_perkebunan)
            ->get();
    }

    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function DataSekolah($id_kecamatan)
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_perkebunan', '=', 'tbl_sekolah.id_perkebunan')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->where('tbl_sekolah.id_kecamatan', $id_kecamatan)
            ->get();
    }

    public function AllDataSekolah()
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_perkebunan', '=', 'tbl_sekolah.id_perkebunan')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->get();
    }

    public function DetailDataSekolah($id_sekolah)
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_perkebunan', '=', 'tbl_sekolah.id_perkebunan')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->where('id_sekolah', $id_sekolah)
            ->first();
    }
}
