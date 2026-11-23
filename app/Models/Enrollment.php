<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Enrollment extends Model
{
    protected $fillable = ['reference','diploma_id','full_name','father_name','phone','email','cnic','education','address','status','admin_note'];
    protected static function booted(): void { static::creating(function ($m) { $m->reference = $m->reference ?: 'ACD-'.now()->format('ym').'-'.Str::upper(Str::random(6)); }); }
    public function diploma(): BelongsTo { return $this->belongsTo(Diploma::class); }
}
