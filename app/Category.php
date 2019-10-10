<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Consumable()
    {
        return $this->hasMany('App\Consumable');
    }
}
