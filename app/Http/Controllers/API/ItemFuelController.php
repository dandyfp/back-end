<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ItemFuel;
use Illuminate\Http\Request;

class ItemFuelController extends Controller
{
    public function index(){
        $itemFuel = ItemFuel::all();

        return response()->json([
            'status' => 'success',
            'data' => $itemFuel
        ]);
    }
}
