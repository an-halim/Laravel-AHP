<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Alternative extends Model
{
    use SoftDeletes;

    protected $fillable = ['model', 'nama', 'harga', 'watt', 'kapasitas', 'garansi', 'keterangan', 'gambar'];
    protected $dates = ['deleted_at'];

    public function comparisons()
    {
        return $this->hasMany(Comparisons::class, 'alternative_id');
    }


    public static function Categorize()
    {
        // Load alternatives with comparisons and their associated subCriteria and criteria
        $alternatives = self::with('comparisons.subCriteria.criteria')->get();

        // Initialize an array to store the updated alternatives
        $results = [];

        // Loop through each alternative
        foreach ($alternatives as $alternative) {
            // Make a copy of the alternative to avoid modifying the original directly
            $modifiedAlternative = $alternative->replicate();

            // Loop through each comparison for the current alternative
            foreach ($alternative->comparisons as $comparison) {
                // Get the criteria name from the comparison
                $criteriaName = $comparison->subCriteria->criteria->name;

                // Check if the modified alternative has a corresponding property for this criteria (case-insensitive)
                foreach ($modifiedAlternative->getAttributes() as $key => $value) {
                    if (strtolower($key) === strtolower($criteriaName)) {
                        // Assign the value from the comparison to the corresponding property of the alternative
                        $modifiedAlternative->{$key} = $comparison->subCriteria->name;
                    }
                }
            }

            // Add the modified alternative to the results array
            $results[] = $modifiedAlternative;
        }

        // Return the results as a collection
        return collect($results); // Use collect() to convert the array to a collection
    }

}
