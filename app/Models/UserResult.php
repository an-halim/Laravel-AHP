<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add user_id to the fillable array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
