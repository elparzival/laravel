<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validar(Request $request)
    {
        $datos = request();
        
        $user = Usuario::where('username', $request->user)->first();
        if($user)
        {
            //Comprobamos la contraseña con hash
            if($request->password == $user->password)
            {
                $request->session()->put('user',  request()->user);
                return response()->json(["result" => "ok"]);
            }else{
                return response()->json(["result" => "no_key"]);
            }
        }else{
            return response()->json(["result" => "no_user"]);
        }
    }

    public function salir()
    {
        $username = request()->session()->get('user');
        //return response()->json(["result" => $username]);
        
        if(session()->has('user'))
        {
            session()->pull('user');
            return response()->json(["result" => "ok"]);
        }
        
    }
}
