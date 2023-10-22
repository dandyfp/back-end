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

            'name_order'=>'nullable',
            'province'=>'nullable',
            'subdistrict'=>'nullable',
            'city'=>'nullable',
            'detail_address'=>'nullable',
            'payment_method'=>'nullable',
            'status'=>'nullable',
            'price'=>'nullable',
            'liter'=>'nullable',
            'telpon'=>'nullable',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }

        $idFuel = $request->query('id_fuel');
        $idUser = $request->query('user_id');
        $nameFuel = ItemFuel::where('id',$idFuel)->first();


        $input = $request->all();
        $input['id'] = Str::uuid()->toString();
        $input['name_fuel'] = $nameFuel?->name;
        $input['number_oktan']=$nameFuel?->number_oktan;
        $input['id_fuel'] = $idFuel;
        $input['user_id'] = $idUser;
        $input['shipping_cost'] = 5000;

        $input['full_address'] = $request->input('detail_address') . ', ' . $request->input('subdistrict') . ', ' . $request->input('city') . ', ' . $request->input('province');

        OrderFuel::create($input);


        return response()->json([
            'status'=>'success',
            'message' => 'Pesanan dibuat silahkan kunjungi profil untuk melihat status pemesanan',
            //'data' => $success,
        ]);

    }

    public function updateOrder(Request $request, $id){
        $order = OrderFuel::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name_order'=>'nullable',
            'province'=>'nullable',
            'subdistrict'=>'nullable',
            'city'=>'nullable',
            'detail_address'=>'nullable',
            'payment_method'=>'nullable',
            'status'=>'nullable',
            'price'=>'nullable',
            'liter'=>'nullable',
            'telpon'=>'nullable',

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }

        $order->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil',
            'data' => $order,
        ],200);
    }


    public function updateToOnDelivery(Request $request ){

        $validator = Validator::make($request->all(),[
            'status'=>'required',
            'id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }

        $data = OrderFuel::findOrFail($request->id);
       // $order = $request->only('status');

        //$data->update($order);
        $data->update([
            'status' => $request->status,
        ]);


        return response()->json([

            'status' => 'success',
            'message' =>'success update',
        ]);






    }

    public function indexMyOrder(){

        $user = auth()->user(); // Mendapatkan informasi pengguna yang sedang masuk
        $myOrder = $user->orders; // Mengambil pesanan berdasarkan relasi

        //$myOrder = OrderFuel::all();
        return response()->json([
            'data' => $myOrder,
        ]);

    }

    public function indexAllOrder(){

        //$user = auth()->user(); // Mendapatkan informasi pengguna yang sedang masuk
        //$myOrder = $user->orders; // Mengambil pesanan berdasarkan relasi

        $myOrder = OrderFuel::all();
        return response()->json([
            'data' => $myOrder,
        ]);

    }

    public function indexAllOrderReceived(){

        $status = 'order received';
        $order = OrderFuel::where('status',$status)->get();

        return response()->json([
            'data' => $order,
        ]);

    }

    public function indexAllOrderOnProcess(){
       // ['on delivery','on prosses']

        $status = ['on prosses','on delivery',];
        $order = OrderFuel::whereIn('status',$status)->get();

        return response()->json([
            'data' => $order,
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
