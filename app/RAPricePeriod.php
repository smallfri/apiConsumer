<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAPricePeriod extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'period_start',
        'period_end',
        'weekday_price',
        'weekend_price',
        'weekly_price',
        'minstay',
        'name',
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'period_start' => 'required',
        'period_end' => 'required',
        'weekday_price' => 'required',
        'weekend_price' => 'required',
        'weekly_price' => 'required',
        'minstay' => 'required',
        'name' => 'required',
    ];

    protected $table = 'redawning_price_periods';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
