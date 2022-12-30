<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Icon;


class IconController extends Controller
{
    //
    public function iconss($query)
    {
        $response = Http::get('https://fonts.google.com/icons?icon.category=action&icon.style=Filled&icon.set=Material+Icons&icon.query=approve');
        return $response;
        $temp = null;
        if ($response->failed()) {
           return $response;
        } else {
            //    return $response['data']['search'];
            if(isset($response['data']))
                $temp = $response['data'];
        }
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
        if(isset($temp['search']))
        {
            $data = $temp['search'];
            foreach ($data as $item) {
                // echo $item['id']; 
                echo '<i class="fas fa-'.$item['title'].'"></i>';
                echo '<br>';echo '<br>';
            }
        }
            
        
    }
    public function icons($query)
    {
        
        $icons=Icon::where('title', 'LIKE','%'.$query.'%')->get();
        return view("icons",compact('icons'));
    }
}
