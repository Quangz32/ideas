<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    //Eager loading
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like');  //->withTimestamps();
    }
}
