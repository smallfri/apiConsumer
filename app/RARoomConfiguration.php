<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RARoomConfiguration extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'name',
        'beds',
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'name' => 'required',
        'beds' => 'required'

    ];

    protected $table = 'redawning_room_configuration';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
