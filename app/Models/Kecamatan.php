<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sekolahs()
    {
        return $this->hasMany(Sekolah::class);
    }

    public function kotas()
    {
        return $this->hasMany(Kota::class);
    }
}
