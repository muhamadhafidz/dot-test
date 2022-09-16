<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_acara extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function presensis() 
    {
        return $this->hasMany(Presensi::class, 'berita_acara_id');
    }
}
