<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAStatus extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'base_weekday_price',
        'base_weekend_price',
        'base_weekly_price',
        'base_minstay',
        'other',
        'tax_percent',
        'nightly_tax',
        'cleaning_fee'
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'base_weekday_price' => 'required',
        'base_weekend_price' => 'required',
        'base_weekly_price' => 'required',
        'base_minstay' => 'required',
        'other' => 'required',
        'tax_percent' => 'required',
        'nightly_tax' => 'required',
        'cleaning_fee' => 'required'

    ];

    protected $table = 'redawning_status';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
