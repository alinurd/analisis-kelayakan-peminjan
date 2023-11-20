<?php

namespace App\Http\Controllers;

// use App\Http\Resources\modules;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Parameter;
use App\Models\Modules;
use App\Models\User;

class Controller extends BaseController
{
     
    use AuthorizesRequests, ValidatesRequests;
    public function paramAll()
    {
        $parameters = Parameter::all();
        return response()->json($parameters);    
    }
    public function modulesAll()
    {
        $Modules = Modules::all();
        return response()->json($Modules);    
    }
    public function userAll()
    {
        $users = User::all();
        return response()->json($users);
    }
}
