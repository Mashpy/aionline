<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareCategory extends Model
{
    protected $fillable = ['name', 'software_category_slug', 'parent_id'];
    public function children()
    {
        return $this->hasMany(SoftwareCategory::class, 'parent_id');
    }
}
