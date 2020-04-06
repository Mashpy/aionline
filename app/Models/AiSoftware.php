<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AiSoftwareLikeCount;
use Request;

class AiSoftware extends Model{
    protected $appends = ['logo_url', 'short_description'];
    const IMAGE_UPLOAD_PATH = 'uploads/ai_software/image';
    protected $fillable = ['software_category_id','name','description','official_link','slug','logo'];

    public function softwareCategoryName(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getAlternateSoftwareAttribute(){
        return self::where('category_id', $this->category_id)->where('id', '!=', $this->id)->get();
    }

    public function getLogoUrlAttribute(){
        return asset(self::IMAGE_UPLOAD_PATH.'/'.$this->created_at->format('Y').'/'.$this->created_at->format('m').'/'.$this->logo);
    }

    public function getLikeStatusAttribute(){
       return  $status = AiSoftwareLikeCount::where(['ai_software_id' => $this->id, 'client_ip' => \Request::ip()])->first();
    }

    public function softwareScreenshot(){
        return $this->hasMany(AiSoftwareScreenshot::class, 'ai_software_id');
    }

    public function getShortDescriptionAttribute()
    {
        $description = strip_tags($this->description);
        $description = preg_replace('#\n#', '', $description);
        $description = preg_replace('#\t#', '', $description);
        $description = preg_replace('#\r#', '', $description);
        $description = preg_replace('/\s+/', ' ', $description);
        $description = trim($description);
        $description_array = explode(' ', $description);
        $description_array = array_slice($description_array,0, 20);
        return $description = implode(' ', $description_array);
    }

}
