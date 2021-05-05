<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'body',
        'user_id',
        'post_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($comment){
            $comment->user_id = auth()->user()->id;
        });
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
