<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RACicoTime extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'check_in_start',
        'check_in_end',
        'check_out',
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'check_in_start' => 'required',
        'check_in_end' => 'required',
        'check_out' => 'required',
    ];

    protected $table = 'redawning_cico_times';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
