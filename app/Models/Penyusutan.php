<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyusutan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function asets()
    {
        return $this->belongsToMany(Aset::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
