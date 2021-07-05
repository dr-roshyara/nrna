<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 
use App\Models\User;
class Electionmember extends Model
{
    use HasFactory;
     /**
     * Each Election member belongs to only  one user 
     */
    public function user(){
           return $this->belongsTo(User::class); 
       } 
}
