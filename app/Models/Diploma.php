<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Diploma extends Model
{
    protected $fillable = ['category_id','title','slug','short_description','description','duration','fee','registration_fee','currency','approval_type','awarding_body','approval_reference','certificate_type','image','is_published','featured'];
    protected function casts(): array { return ['fee'=>'decimal:2','registration_fee'=>'decimal:2','is_published'=>'boolean','featured'=>'boolean']; }
    protected static function booted(): void {
        static::creating(function ($model) { if (!$model->slug) $model->slug = Str::slug($model->title).'-'.Str::lower(Str::random(5)); });
        static::updating(function ($model) { if ($model->isDirty('title') && !$model->isDirty('slug')) $model->slug = Str::slug($model->title).'-'.Str::lower(Str::random(5)); });
    }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function enrollments(): HasMany { return $this->hasMany(Enrollment::class); }
}
