<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   

    protected $table = 'users';

    protected $fillable = [
        'name',
        'user_lastName',
        'email',
        'user_cuit',
        'user_businessName',
        'user_phone',
        'user_ivaType',
        'user_ivaExclusion',
        'user_ibRegiment',
        'user_ibNumber',
        'user_ibProvince',
        'user_deliveryAddress',
        'user_deliveryAddressLocation',
        'user_deliveryAddressProvince',
        'user_deliveryAddressPostalCode',
        'user_deliveryAddressRef',
        'url_avatar',
        'card_id',
        'user_role',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isRole()
    {
        return $this->user_role;
    }
}