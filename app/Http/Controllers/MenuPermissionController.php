<?php

namespace App\Http\Controllers;

use App\Models\MenuPermission;
use App\Models\SubMenuPermission;
use Illuminate\Http\Request;

class MenuPermissionController extends Controller
{
    public static function main_menu(){
        $id = auth()->user()->id;
        return MenuPermission::where('user_id',$id)->get()->toArray();
    }

    public static function sub_menu(){
        $id = auth()->user()->id;
        return SubMenuPermission::where('user_id',$id)->get()->toArray();
    }
}
