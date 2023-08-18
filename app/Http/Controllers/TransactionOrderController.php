<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionOrderController extends Controller
{
    public function indexTransactionsOrder($idOrder){
        $transaction = TransactionOrder::where('id_order', $idOrder)->with('orderFuels')->firstOrFail();

        return response()->json([
            'data' => $transaction
        ]);
    }

    public function createTransactionOrder(Request $request){
        $validator = Validator::make($request->all(),[
            'id_user' => 'required',
            'id_order' => 'required',
            'id_fuel' => 'required',
            'trype_transaction',
            'transaction_payment_method' => 'required',
            'amount' => 'required',
            'date'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],500);
        }
       // $fuel = ItemFuel::where('id')->first();

        $input = $request->all();
       // $input['id'] = Str::uuid()->toString();
        //$input['name_fuel'] = $fuel->name_fuel;
        Transaction::create($input);


        return response()->json([
            'status'=>'success',
            'message' => 'success add',
            //'data' => $success,
        ]);



    }
}
