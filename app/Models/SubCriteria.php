<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    protected $fillable = ['code', 'criteria_id', 'name', 'nilaik', 'nilaib'];
    protected $dates = ['deleted_at'];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function getCriteriaNameAttribute()
    {
        return $this->criteria ? $this->criteria->name : null;
    }
}
