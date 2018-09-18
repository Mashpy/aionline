<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $appends = ['upload_url'];

    public function tutorial()
    {
        return $this->belongsTo('App\Models\Tutorial');
    }

    public function getUploadUrlAttribute(){
        $general_directory = config('constants.tutorial_upload_directory');
        $folder_path = $general_directory . $this->created_at->year . "/" . $this->created_at->format('m') . "/";
        $upload_url = $folder_path.$this->name;

        return $upload_url;
    }
}