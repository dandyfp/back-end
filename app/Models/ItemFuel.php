<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFuel extends Model
{
    use HasFactory;


    protected $table = 'item_fuels';

    protected $primarykey = 'id';

    public $incrementing = false;

    protected $guarded = [

    ];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
