<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['user_result_id', 'model', 'nama', 'harga', 'watt', 'kapasitas', 'garansi', 'gambar', 'ahp'];
    protected $dates = ['deleted_at'];

    public function userResult()
    {
        return $this->belongsTo(UserResult::class);
    }

    public function getResultLogged()
    {
        return $this->hasMany(UserResult::class)->where('user_result_id', auth()->id());
    }
}
