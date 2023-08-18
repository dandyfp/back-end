<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionOrder extends Model
{
    use HasFactory;
    use HasUuids;


    protected $table = 'transaction_order';

    protected $guarded = [];

    public $incrementing = false;


     public function orderFuels()
    {
        return $this->hasMany(OrderFuel::class,'order_id','id');
    }


}
