<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class VehicleController extends Controller
{
    public function createVehicle(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'type_vehicle'=>'required',
            'name_brand'=>'required',
            'number_vehicle'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }

       // $idUser = $request->query('user_id');
        //$input['id'] = Str::uuid()->toString();
        $input = $request->all();
       // $input['user_id'] = $idUser;
        Vehicle::create($input);


        return response()->json([
            'status'=>'success',
            'message' => 'Kendaraan kamu sudah ditambahkan',
            //'data' => $success,
        ]);


    }

    public function getMyVehicle(Request $request ){
        $userId = $request->query('user_id');
        $myVehicle = Vehicle::where('user_id',$userId)->first();

        return response()->json([
            'data' => $myVehicle,
        ],200);


    }
}
