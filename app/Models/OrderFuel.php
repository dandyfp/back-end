<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFuel extends Model
{
    use HasFactory;

    protected $table = 'order_fuel';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $incrementing = false;

    public function transaction (){
        return $this->belongsTo(TransactionOrder::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $hidden = [
       // 'created_at',
        'updated_at',
    ];

}
