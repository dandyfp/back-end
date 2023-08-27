<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->belongsTo(OrderFuel::class);
    }

    protected $table = 'transaction';

    protected $guarded = [];

    public $incrementing = false;

   /*  public function orderFuels()
    {
        return $this->hasMany(OrderFuel::class,'id','id_order');
    } */

}
