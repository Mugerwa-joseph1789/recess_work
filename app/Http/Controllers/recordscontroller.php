<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
Use App\models\general_hospital;
Use App\models\national_hospital;
Use App\models\regional_hospital;

class recordscontroller extends Controller
{
    //
    function give(){
        $data=general_hospital::all();
        return view('general',['general_hospitals'=>$data]);
    }
    public function index(){
        return view('records');
    }
    function nation(){
        $data=national_hospital::all();
        return view('national',['national_hospitals'=>$data]);
    }
    function region(){
        $data=regional_hospital::all();
        return view('regional',['regional_hospitals'=>$data]);
    }
}
