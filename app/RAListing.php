<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAListing extends Model {

    protected $fillable = [
        "listing_id",
        "url_alias",
        "cico_times",
        "price",
        "status",
        "photos",
        "policies",
        "repconfig",
        "created",
        "updated",
    ];

    protected $dates = [];

    public static $rules = [
        "listing_id" => "required",
        "url_alias" => "required",
        "created" => "required",
        "updated" => "required",
    ];

    protected $table = 'redawning_listings';
    protected $primaryKey = 'listing_id';

    public function project()
    {
        //return $this->belongsTo("App\Project");
    }

    public function photos()
    {
        return $this->hasMany('App\RAPhoto', 'redawning_listing_id', 'listing_id');
    }

    public function availability()
    {
        return $this->hasMany('App\RAAvailability', 'redawning_listing_id', 'listing_id');
    }

    public function cico()
    {
        return $this->hasMany('App\RACico', 'redawning_listing_id', 'listing_id');
    }

    public function cicotimes()
    {
        return $this->hasMany('App\RACicoTime', 'redawning_listing_id', 'listing_id');
    }

    public function content()
    {
        return $this->hasOne('App\RAContent', 'redawning_listing_id', 'listing_id');
    }

    public function priceperiod()
    {
        return $this->hasMany('App\RAPricePeriod', 'redawning_listing_id', 'listing_id');
    }

    public function roomconfiguration()
    {
        return $this->hasMany('App\RARoomConfiguration', 'redawning_listing_id', 'listing_id');
    }

}
