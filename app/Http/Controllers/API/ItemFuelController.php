<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ItemFuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

//use Illuminate\Support\Facades\Validator;

class ItemFuelController extends Controller
{
    public function index(){
        $itemFuel = ItemFuel::all();
        return response()->json([
            'status' => 'success',
            'message' => 'success',
            'data' =>  $itemFuel
        ],200);
    }

    public function createFuel(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'number_oktan' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }

        $input = $request->all();
        $input['id'] = Str::uuid()->toString();
        ItemFuel::create($input);

        return response()->json([
            'status'=>'success',
            'message' => 'success add',
            //'data' => $success,
        ]);

    }
}
