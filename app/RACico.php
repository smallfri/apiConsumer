<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RACico extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'start_date',
        'end_date',
        'check_in_allowed',
        'check_out_allowed',
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'check_in_allowed' => 'required',
        'check_out_allowed' => 'required',
    ];

    protected $table = 'redawning_cico';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
