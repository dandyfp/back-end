<?php

namespace App\Http\Controllers;

use App\Models\ItemFuel;
use App\Models\OrderFuel;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    public function createTransaction(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'id_order' => 'required',
            'id_fuel' => 'required',
            'type_transaction',
            'transaction_payment_method' => 'required',
            'amount' => 'required',
            'date'=>'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }
       // $fuel = ItemFuel::where('id')->first();


       $order = OrderFuel::findOrFail($request->id_order);
       $data = $request->only('status');
       $order->update($data);


        $input = $request->all();
        $input['id'] = Str::uuid()->toString();
        //$input['name_fuel'] = $fuel->name_fuel;


        Transaction::create($input);


        return response()->json([
            'status'=>'success',
            'message' => 'success add',
            //'data' => $success,
        ]);



    }


    public function indexTransactions(){
        $user = auth()->user(); // Mendapatkan informasi pengguna yang sedang masuk
        $myTransaction = $user->transaction; // Mengambil pesanan berdasarkan relasi

        $transaction = Transaction::all();


        return response()->json([
            'data' => $myTransaction
        ]);
    }

    public function indexAllTransaction(){

        $transaction = Transaction::with('user')->get();
        return response()->json([
            'data' => $transaction
        ]);
    }

    public function indexTransactionFuel($idFuel){
        $transaction = Transaction::where('id_fuel', $idFuel)->get();

        return response()->json([
            'data' => $transaction
        ]);
    }
}
