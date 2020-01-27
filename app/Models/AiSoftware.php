<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiSoftware extends Model{
    protected $appends = ['logo_url'];
    const IMAGE_UPLOAD_PATH = '/uploads/ai_software/image/';
    protected $fillable = ['software_category_id','name','description','official_link','slug','logo'];

    public function softwareCategoryName(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getAlternateSoftwareAttribute(){
        return AiSoftware::where('category_id', $this->category_id)->get();
    }

    public function getLogoUrlAttribute(){
        return asset(self::IMAGE_UPLOAD_PATH.'/'.$this->created_at->format('Y').'/'.$this->created_at->format('m').'/'.$this->logo);
    }

}
