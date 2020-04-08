<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiSoftwareScreenshot extends Model
{
    protected $appends = ['screenshot_url'];
    const SCREENSHOT_UPLOAD_PATH = 'uploads/ai_software/screenshot/';
    protected $fillable = ['ai_software_id', 'image'];

    public function softwareCategoryName(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getScreenshotUrlAttribute(){
        if(file_exists(public_path(self::SCREENSHOT_UPLOAD_PATH.$this->created_at->format('Y').'/'.$this->created_at->format('m').'/'.$this->image))){
            return asset(self::SCREENSHOT_UPLOAD_PATH.$this->created_at->format('Y').'/'.$this->created_at->format('m').'/'.$this->image);
        }
    }
}
