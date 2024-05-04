<?php

namespace App\Http\Controllers;

use App\Models\deploy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class redeployController extends Controller
{
    public function index(){
        $redeploy = deploy::get();
        return view('redeploy.index', compact('redeploy'));
    }
}

    

