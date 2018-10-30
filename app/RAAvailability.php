<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAAvailability extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'period',
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'period' => 'required',
    ];

    protected $table = 'redawning_availability';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
