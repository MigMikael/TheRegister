<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'id', 'name', 'price'
    ];

    public function order()
    {
        return $this->hasOne('App\ItemOrder');
    }
}
