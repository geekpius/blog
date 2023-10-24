<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'fileable_type',
        'fileable_id',
        'size',
        'path',
        'type',
        'format',
        'disk',
        'url',
    ];


    public  function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
