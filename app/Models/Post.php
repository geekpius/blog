<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, FileTrait, SoftDeletes;

    protected $fillable = ['external_id', 'title', 'content', 'user_id'];

    protected $dates = ['deleted_at'];

    public function setTitleAttribute(string $value): void
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute(string $value): string
    {
        return ucwords($value);
    }

    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function createBannerImage(string $base64File): void
    {
        $this->saveFileToStorage($base64File, $this);
    }
}
