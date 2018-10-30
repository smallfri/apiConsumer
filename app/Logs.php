<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model {

    protected $fillable = ["command", "url", "product_id", "expected", "actual"];

    protected $dates = [];

    public static $rules = [
        "command" => "required",
        "url" => "required",
        "product_id" => "required",
        "expected" => "required",
        "actual" => "required",
        "data" => "required"];

    public function project()
    {
        return $this->belongsTo("App\Project");
    }


}
