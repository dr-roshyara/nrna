<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//
use App\Models\User;
use App\Models\Post;
use App\Models\Vote;
class Candidacy extends Model
{
    use HasFactory;
     /**
     * Each Candidacy  belongs to only  one user 
     * Get the user 
     */
    public function user(){
           return $this->belongsTo(User::class);
       }
     /**
      * One Candidacy belongs to One Post 
      * Get the post 
       */
      public function post(){ 
           return $this->belongsTo(Post::class);
       }
       /**
        * A candidacy has many votes. Also A Vote is for many posts so 
        * Its better to build a many to many relationship  
        */
        /**
        *  Get all of the tags for the post.
        */
        public function votes() 
        {
        return $this->morphToMany(Vote::class, 'votable');
        }
} 


