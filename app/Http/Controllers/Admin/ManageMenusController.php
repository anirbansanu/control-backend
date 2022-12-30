<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMenu;


class ManageMenusController extends Controller
{
    //
    public function index(){
        $menus = UserMenu::all();
        return view('admin.pages.manage.menus.index',compact('menus'));
    }
    public function create(){
        
        return view('admin.pages.manage.menus.create');
    }
    public function store(Request $req)
    {
        // return $req->all();
        $inputs = [];
        $inputs['title']=$req->title;
        $inputs['subtitle']=$req->subtitle;
        $inputs['icon']=$req->menu_icon;
        $inputs['route']=$req->menu_link;
        $inputs['color_code']=$req->color_code;
        $inputs['description']=$req->description;

        $menu = UserMenu::create($inputs);
        return redirect()->back()->with('success','User Menu Added Successfully');
    }
    public function changeStatus($id)
    {
        $menu = UserMenu::find($id);
        if($menu->status==1){
            $menu->status = 0;
            $menu->update();
            return redirect()->back()->with('success','User Menu deactivated Successfully');
        }
        else if($menu->status==0){
            $menu->status = 1;
            $menu->update();
            return redirect()->back()->with('success','User Menu activated Successfully');
        }
        else{
            return redirect()->back()->with('success','User Menu not exist');
        }

    }
    public function destroy($id)
    {
        $menu = UserMenu::destroy($id);
        return redirect()->route('admin.manage.menu.index')->with('success','User Menu Deleted Successfully');
    }
    
}
