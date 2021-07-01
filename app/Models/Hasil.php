<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_hasil';
    protected $table = "hasils";

    public function wilayah()
    {
        return $this->hasOne(Wilayah::class, 'id_wilayah', 'id_wilayah');
    }

    public function perkebunan()
    {
        return $this->hasOne(Perkebunan::class, 'id_perkebunan', 'id_perkebunan');
    }
}
