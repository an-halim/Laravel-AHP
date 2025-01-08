<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['model', 'nama', 'harga', 'watt', 'kapasitas', 'dayatahan', 'gambar', 'ahp'];
    protected $dates = ['deleted_at'];
}
