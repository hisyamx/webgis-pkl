<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function wilayah()
    {
        return $this->hasOne(Wilayah::class, 'id_wilayah', 'id_perkebunan');
    }

    public function perkebunan()
    {
        return $this->hasOne(Perkebunan::class, 'id_perkebunan', 'id_perkebunan');
    }
}
