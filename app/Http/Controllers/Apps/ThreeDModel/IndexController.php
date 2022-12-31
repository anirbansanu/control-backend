<?php

namespace App\Http\Controllers\Apps\ThreeDModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('apps.threedmodel.threedmodel');
    }
}
