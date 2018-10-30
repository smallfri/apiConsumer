<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAPhoto extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'order',
        'tags',
        'title',
        'width',
        'height'
        ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'url' => 'required',
        'order' => 'required',
        'tags' => 'required',
        'title' => 'required',
        'width' => 'required',
        'height' => 'required'
    ];

    protected $table = 'redawning_photos';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
