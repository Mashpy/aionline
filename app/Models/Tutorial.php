<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $appends = ['tutorial_url', 'tutorial_cover'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function uploads(){
        return $this->hasMany('App\Models\Upload');
    }

    public function getTutorialUrlAttribute(){
        $tutorial_url = route('tutorial.show', [$this->category->category_slug, $this->slug]);
        $blog_url = route('blog.show', [$this->slug]);
        return $this->category->category_slug == 'blog' ? $blog_url : $tutorial_url;
    }

    public function getTutorialCoverAttribute(){
        $default_tutorial_path = '/images/icons/machine_learning_default.jpg';
        $tutorial_cover = Upload::where('tutorial_id', $this->id)->first();
        if($tutorial_cover){
            $general_directory = config('constants.tutorial_upload_directory');
            $folder_path = $general_directory . $tutorial_cover->created_at->year . "/" . $tutorial_cover->created_at->format('m') . "/";
        }
       return $upload_url = $tutorial_cover ? $folder_path.$tutorial_cover->name : $default_tutorial_path;
    }

    public static function machineLearningTutorials() {
        $category_id = Category::where('category_slug', 'machine-learning')->first()->id;
        return Tutorial::where('category_id', $category_id)->take(6)->get();
    }
}
