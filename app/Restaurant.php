<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'zipcode', 'phone',
    ];

    public function User()
    {
        return $this->hasOne('App\User');
    }

    public function Consumable()
    {
        return $this->hasMany('App\Consumable');
    }
}
