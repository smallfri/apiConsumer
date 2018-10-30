<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = ["command", "url", "product_id", "expected", "actual", "project_id"];

    protected $dates = [];

    public static $rules = [
        "command" => "required",
        "url" => "required",
        "product_id" => "required",
        "expected" => "required",
        "actual" => "required",
        "project_id" => "required|numeric",
    ];

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
