<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $casts = [
        'status' => OrderStatus::class
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }


    use HasFactory;
}
