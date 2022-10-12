<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class JWTController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'mobile' => 'required|unique:users,mobile',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

    /**
     * Refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get user profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    public function changeprofile(Request$request)
        {
            $user = Auth::user();
            $profile =  User::where('id' , $user->id)->update(['name' => $request->name , 'email' => $request->email]);

            return response()->json([
                'message' => 'User successfully changeprofile',
                'user' => $profile
            ], 201);
        }

    public function changepassword(Request$request){
        $request->validate([
//            'user_id' => 'required|integer',
            'passwordOld'=>'required|min:6',
            'passwordNew'=>'required|min:6',
            'passwordNew1'=>'required|min:6',
        ]);
        $user = Auth::user();
//        if($user->id==$request->user_id){
            $passwordOld= Hash::check($request->passwordOld, $user->password);
        if(!$passwordOld){
            return 'The password is incorrect';
        }else{
           if($request->passwordNew==$request->passwordNew1){
           $pp = bcrypt($request->passwordNew);

            $table = User::where('id' , $user->id)->update(['password' => $pp]);

               if($table){
                   return Response()->json([
                       'message' => 'Password successfully changed',
                       'status'=>200,
                   ],200);
               }else{
                   return Response()->json([
                       'message' => 'NOt Faound',
                   ],404);
               }
           }else{
               return 'Password is not the same';
           }
        }
//        }else{
//            return Response()->json([
//                'message' => 'You do not have permissions for this user',
//            ],300);
//        }
    }



    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
