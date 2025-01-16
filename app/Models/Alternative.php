<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Alternative extends Model
{
    use SoftDeletes;

    protected $fillable = ['model', 'nama', 'harga', 'watt', 'kapasitas', 'dayatahan', 'keterangan', 'gambar'];
    protected $dates = ['deleted_at'];

    public function comparisons()
    {
        return $this->hasMany(Comparisons::class, 'alternative_id');
    }
}
