<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['user_result_id', 'alternative_id', 'nama', 'model', 'ahp'];
    protected $dates = ['deleted_at'];


    public function userResult()
    {
        return $this->belongsTo(UserResult::class);
    }

    public function getResultLogged()
    {
        return $this->hasMany(UserResult::class)->where('user_result_id', auth()->id());
    }


    public static function getPercentageIncrease()
    {
        $today = Carbon::now()->startOfDay();
        $yesterday = Carbon::now()->subDay()->startOfDay();

        $todayData = Hasil::where('created_at', '>=', $today)
            ->where('created_at', '<', $today->copy()->addDay())
            ->count();

        $yesterdayData = Hasil::where('created_at', '>=', $yesterday)
            ->where('created_at', '<', $today)
            ->count();

        if ($yesterdayData > 0) {
            $percentageIncrease = (($todayData - $yesterdayData) / $yesterdayData) * 100;
        } else {
            $percentageIncrease = 0;
        }

        return number_format($percentageIncrease, 2) . '%';
    }

    public static function getTop5ByAhpScore()
    {
        return self::orderByDesc('ahp') // Order by ahp score in descending order
            ->limit(5) // Limit to top 5 results
            ->get('model')
            ->toArray();
    }

    public static function getAlternativeByModelAndUserResultId($userResultId, $size = 6)
    {
        return self::where('user_result_id', $userResultId)
            ->join('alternatives', 'hasils.alternative_id', '=', 'alternatives.id')
            ->orderBy('hasils.ahp', 'desc')
            ->select([
                'alternatives.model',
                'alternatives.nama',
                'alternatives.harga',
                'alternatives.watt',
                'alternatives.kapasitas',
                'alternatives.garansi',
                'alternatives.keterangan',
                'alternatives.gambar',
                'hasils.user_result_id',
                'hasils.alternative_id',
                'hasils.ahp'
            ])->paginate($size);
    }
}
