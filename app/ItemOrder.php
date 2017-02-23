<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    protected $table = 'item_order';

    protected $fillable = [
        'id', 'order_id', 'item_id', 'amount'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
