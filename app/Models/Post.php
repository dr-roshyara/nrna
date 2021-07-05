<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * Each Post has many candidates 
     * so get them 
     */
    public function candidates(){
        return $this->hasMany(Candidacy::class);
    }
    /**
     * There is a many to many relationship between post and Vote . 
     * becasue : A post can have many candidacy and a  vote  is for many posts and  contains many posts 
     */
    /**
     * Get all of the votes for the post.
     */
    public function votes()
    {
        return $this->morphToMany(Vote::class, 'votable');
    }
}
