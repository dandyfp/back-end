<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $guarded = [];

    public $incrementing = false;

   /*  public function orderFuels()
    {
        return $this->hasMany(OrderFuel::class,'id','id_order');
    } */

}