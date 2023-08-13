<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFuel extends Model
{
    use HasFactory;

    protected $table = 'order_fuel';

    protected $guarded = [];

    public $incrementing = false;


    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
