<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'title',
      'overview'   
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
