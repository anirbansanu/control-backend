<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMenu;

class HomeController extends Controller
{
    //
    public function index()
    {
        $menus = UserMenu::all();
        return view('user.pages.home',compact('menus'));
    }
}
