<?php

namespace App\Models;

use Carbon\Traits\Comparison;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    protected $fillable = ['code', 'criteria_id', 'name', 'value', 'operator', 'weight'];
    protected $dates = ['deleted_at'];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function getCriteriaNameAttribute()
    {
        return $this->criteria ? $this->criteria->name : null;
    }

    public function comparisons()
    {
        return $this->hasMany(Comparisons::class, 'sub_criteria_id');
    }

    public function alternatives()
    {
        return $this->belongsToMany(Alternative::class, 'comparisons', 'sub_criteria_id', 'alternative_id')->withPivot('value');
    }

    // get criteria name
    public function getCriteriaName()
    {
        return $this->criteria->name;
    }
}
