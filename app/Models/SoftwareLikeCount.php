<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareLikeCount extends Model
{
    protected $fillable = ['client_ip','alternative_software_id'];
}
