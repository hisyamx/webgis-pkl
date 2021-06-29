<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_wilayah';
    protected $table = "wilayahs";

    public function wilayah()
    {
        return $this->hasOne(Wilayah::class, 'nama', 'id_wilayah');
    }
}
