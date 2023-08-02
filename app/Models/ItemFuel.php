<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFuel extends Model
{
    use HasFactory;


    protected $table = 'item_fuels';

    protected $guarded = [];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
