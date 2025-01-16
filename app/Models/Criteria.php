<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Criteria extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name'];
    protected $dates = ['deleted_at'];

    public function subCriterias()
    {
        return $this->hasMany(SubCriteria::class);
    }
}
