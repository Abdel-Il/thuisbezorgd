<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    protected $fillable = [
        'title', 'category_id', 'description', 'price',
    ];

    public function Restaurant()
    {
        return $this->manyToMany('App\Restaurant');
    }

    public function Category()
    {
        return $this->hasOne('App\Category');
    }
}
