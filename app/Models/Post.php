<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'is_published'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (is_null($post->user_id)) {
                $post->user_id = auth()->user()->id;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published',true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published',true);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }
}
