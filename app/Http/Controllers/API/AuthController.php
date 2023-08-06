<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message' => 'failed',
                'data' => $validator->errors(),
            ],401);
        }

        $input = $request->all();
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name']= $user->name;


        return response()->json([
            'status'=>'success',
            'message' => 'success register',
            'data' => $success,
        ]);

    }


    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;

            return response()->json([
                'status' => 'success',
                'message' => 'Login success',
                'data' => $success
            ],200);
        } else {
            return response()->json( [
                'status' => 'error',
                'message' => _('wrong email and password'),
                'data' => null
            ],422);
        }
    }

    public function getUser(Request $request){

        return response()->json([
            'status' => 'success',
            'message' => _('success'),
            'data' => $request->user()
        ]);
    }
}
