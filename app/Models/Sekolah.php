<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function asets()
    {
        return $this->hasMany(Aset::class);
    }

    public function penyusutans()
    {
        return $this->hasMany(Penyusutan::class);
    }
}
