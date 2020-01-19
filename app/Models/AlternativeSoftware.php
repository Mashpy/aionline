<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternativeSoftware extends Model{
    const IMAGE_UPLOAD_PATH = 'uploads/alternative_software/image/';
    protected $fillable = ['software_category_id','name','description','official_link','slug','logo'];

    public function softwareCategoryName(){
        return $this->belongsTo(SoftwareCategory::class, 'software_category_id');
    }
    public function getAlternateSoftwareAttribute(){
        return AlternativeSoftware::where('software_category_id', $this->software_category_id)->get();
    }

}
