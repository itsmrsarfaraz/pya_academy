<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['student_name','diploma_title','awarding_body','completion_year','story','student_photo','certificate_image','is_published'];
    protected function casts(): array { return ['completion_year'=>'integer','is_published'=>'boolean']; }
}
