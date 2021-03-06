<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
//
use  Spatie\Permission\Traits\HasRoles;
use App\Models\Vote;
use \App\Models\Candidacy;
use App\Models\File;
use App\Models\Upload;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','telephone',
        'first_name',
        'last_name',
        'country',
        'state',
        'street',
        'housenumber',
        'postalcode',
        'city',
        'nrna_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * Each user has one and only one Vote :
     *      */
    public function vote (){
        return $this->hasone(Vote::class);
        // you can also write $this->hasone('App\Vote')
    }
    /**
     * Each user can have one and only candidacy 
     */
       public function candidacy(){
           return $this->hasone(candidacy::class);
       }
       /**
        * Display all users . 
         */ 
    /**
     * User has many files 
     */
    public function files()
    {
      return $this->hasMany(File::class);
    }
    /**
     * A user has many uploads 
     */
    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
       
}
