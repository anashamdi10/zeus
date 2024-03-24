<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// sanctum
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
protected $fillable = array('name','email','phone','password','country_id','image','point','code','active','status');
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at','email_verified_at'
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
     * @return string
     */
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function delegate()
    {
        return $this->belongsTo(Delegate::class,'delegate_id','id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function town()
    {
        return $this->belongsTo(Town::class,'town_id','id');
    }


    public function reqs()
    {
        return $this->hasMany(Req::class);
    }
    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function requests()
    {
        return $this->hasMany(BalanceRequest::class,'user_id');
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class,'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id');
    }
    public function recos()
    {
        return $this->hasMany(Reco::class,'user_id');
    }
    public function getImageAttribute(){
       return url('storage/user').'/'.$this->attributes['image'];
    }
    public function favourite_products()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

        // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
