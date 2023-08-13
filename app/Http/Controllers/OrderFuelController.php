<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\ItemFuel;
use App\Models\OrderFuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderFuelController extends Controller
{
    public function createOrder(Request $request){

        $validator = Validator::make($request->all(),[

            'name_order'=>'required',
            'province'=>'required',
            'subdistrict'=>'required',
            'city'=>'required',
            'detail_address'=>'required',
            'payment_method'=>'required',
            'status'=>'required',
            'price'=>'required',
            'liter'=>'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }

        $idFuel = $request->query('id_fuel');
        $idUser = $request->query('id_user');
        $nameFuel = ItemFuel::where('id',$idFuel)->first();


        $input = $request->all();
        $input['id'] = Str::uuid()->toString();
        $input['name_fuel'] = $nameFuel->name;
        $input['number_oktan']=$nameFuel->number_oktan;
        $input['id_fuel'] = $idFuel;
        $input['id_user'] = $idUser;
        $input['shipping_cost'] = 5000;

        $input['full_address'] = $request->input('detail_address') . ', ' . $request->input('subdistrict') . ', ' . $request->input('city') . ', ' . $request->input('province');

        OrderFuel::create($input);


        return response()->json([
            'status'=>'success',
            'message' => 'Pesanan dibuat silahkan kunjungi profil untuk melihat status pemesanan',
            //'data' => $success,
        ]);

    }

    public function indexMyOrder(){
        $myOrder = OrderFuel::all();
        return response()->json([
            'data' => $myOrder,
        ]);

    }

    public function myOrder(Request $request){

        $idUser = $request->query('id_user');
        $myOrder = OrderFuel::where('id_user', $idUser)->first();

        if (!$myOrder) {
        return response()->json([
            'status' => 'error',
            'message' => 'Order not found',
                ], 404);
        }

        return response()->json([
                'status' => 'success',
                'message' => 'success',
                'data' => $myOrder,
            ], 200);
    }
}
