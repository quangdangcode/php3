<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'catelory_id',
        'title',
        'content',
        'image',
        'IsActive'
    ];

    protected $casts = [
        'IsActive' => 'boolean',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function catelory()
    {
        return $this->belongsTo(Catelory::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
