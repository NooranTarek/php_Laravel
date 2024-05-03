<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'body', 'image']; 
    protected $fillable = ['title', 'body', 'image', 'user_id', 'postCreator_id','owner_id']; // Add 'postCreator_id' to the fillable array
       use SoftDeletes;
       use Sluggable;

       public function user()
       {
           return $this->belongsTo(User::class, 'user_id');
       }

       public function comments(): MorphMany
       {
           return $this->morphMany(Comment::class, 'commentable');
       }

    function post_creator()
       {
        return $this->belongsTo(User::class, 'postCreator_id','id');
    }
    function owner()
       {
        return $this->belongsTo(User::class, 'owner_id','id');
    }  

       public function sluggable(): array
       {
           return [
               'slug' => [
                   'source' => 'title'
               ]
           ];
       }

}
