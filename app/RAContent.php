<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RAContent extends Model {

    protected $fillable = [
        'redawning_listing_id',
        'title',
        'description',
        'property_type',
        'special_terms',
        'view',
        'bathrooms',
        'bedrooms',
        'beds_king',
        'beds_queen',
        'beds_double',
        'beds_twin',
        'beds_sofa',
        'beds_bunk',
        'beds_air_mattress',
        'kitchen',
        'pool',
        'children_ok',
        'room_configurations_id',
        'sleep_max',
        'pets_allowed',
        'smoking_allowed',
        'amenities',
        'location',
        'handicap_accessible',
        'square_feet',
    ];

    protected $dates = [];

    public static $rules = [
        'redawning_listing_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'property_type' => 'required',
        'special_terms' => 'required',
        'view' => 'required',
        'bathrooms' => 'required',
        'bedrooms' => 'required',
        'beds_king' => 'required',
        'beds_queen' => 'required',
        'beds_double' => 'required',
        'beds_twin' => 'required',
        'beds_sofa' => 'required',
        'beds_bunk' => 'required',
        'beds_air_mattress' => 'required',
        'kitchen' => 'required',
        'pool' => 'required',
        'children_ok' => 'required',
        'room_configurations_id' => 'required',
        'sleep_max' => 'required',
        'pets_allowed' => 'required',
        'smoking_allowed' => 'required',
        'amenities' => 'required',
        'location' => 'required',
        'handicap_accessible' => 'required',
        'square_feet' => 'required',
    ];

    protected $table = 'redawning_content';

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
