<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['tgl_jurnal'];

    public function coa()
    {
        return $this->belongsTo(Coa::class);
    }
}
