<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAListing extends Model {

    protected $fillable = [
        "listing_id",
        "url_alias",
        "content",
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

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
