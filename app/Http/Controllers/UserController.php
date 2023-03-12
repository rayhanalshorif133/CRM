<?php

/**
 * Author: Tushar Das
 * Sr. Software Engineer
 * tushar2499@gmail.com
 * 01815920898
 * STITBD
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MenuPermission;
use App\Models\SubMenuPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function permission()
    {
        $data['main_menu']      = 'basic_settings';
        $data['child_menu']     = 'user-permission';
        $data['user_data']      = User::all();

        return view('basic_settings.user_permission', $data);
    }

    public function user_menu($id)
    {
        $data['menu_permission'] = MenuPermission::where('user_id', $id)->get()->toArray();
        $data['sub_menu_permission'] = SubMenuPermission::where('user_id', $id)->get()->toArray();
        //dd($data['sub_menu_permission']);
        return view('basic_settings.user_menu', $data);
    }

    public function save_permission(Request $request)
    {
        $user_id    = $request->user_id;
        $menu       = $request->menu;
        $sub_menu   = $request->sub_menu;
        MenuPermission::where('user_id', $user_id)->delete();
        SubMenuPermission::where('user_id', $user_id)->delete();

        foreach ($menu as $menu_value) {
            $model = MenuPermission::where('user_id', $user_id)->where('menu_slug', $menu_value)->first();
            if ($model == null) {
                $model              = new MenuPermission();
                $model->user_id     = $user_id;
                $model->menu_slug   = $menu_value;
                $model->created_by  = auth()->user()->id;
                $model->save();
            }
        }
        foreach ($sub_menu as $sub_menu_value) {
            $text = explode('|', $sub_menu_value);
            $menu_value = $text[0];
            $sub_value = $text[1];
            $model = MenuPermission::where('user_id', $user_id)->where('menu_slug', $menu_value)->first();

            if ($model != null) {
                $menu_permission_id = $model->id;
                $sub_model = SubMenuPermission::where('user_id', $user_id)->where('menu_slug', $sub_value)->where('menu_permission_id', $menu_permission_id)->first();

                if ($sub_model == null) {
                    $sub_model                      = new SubMenuPermission();
                    $sub_model->user_id             = $user_id;
                    $sub_model->menu_permission_id  = $menu_permission_id;
                    $sub_model->menu_slug           = $sub_value;
                    $sub_model->created_by          = auth()->user()->id;
                    $sub_model->save();
                    //dd($sub_model);
                }
            }
        }
        return redirect()->back()->with('success', 'Permission Saved Successfully');
    }

    public function index()
    {
        $data['main_menu']      = 'basic_settings';
        $data['child_menu']     = 'user';
        $data['user_data']      = User::all();

        return view('basic_settings.user_list', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'role'          => 'required'
        ]);

        $model = new User();
        $model->name            = $request->post('name');
        $model->email           = $request->post('email');
        $model->password        = Hash::make($request->post('password'));
        $model->role            = $request->post('role');
        $model->save();

        $msg = "User Inserted.";
        $request->session()->flash('message', $msg);

        return redirect('user-list')->with('status', 'User created!');
    }

    function status_update(Request $request, $status = 1, $id = null)
    {

        $model                  = User::find($id);
        $model->status          = $status;
        $model->save();

        $msg = "User Status Updated.";
        $request->session()->flash('message', $msg);

        return redirect('user-list')->with('status', 'User Status updated!');
    }

    function update(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'     => 'required'
        ]);
        //dd($request->post());
        $model = User::find($request->post('id'));
        $model->name        = $request->post('name');
        $model->email        = $request->post('email');
        $model->role        = $request->post('role');
        if (!empty($request->post('password'))) {
            $model->password        = Hash::make($request->post('password'));
        }
        $model->save();

        $msg = "User Updated.";
        $request->session()->flash('message', $msg);

        return redirect('user-list')->with('status', 'User updated!');
    }

    function getUsers(Request $request)
    {
        if ($request->ajax()) {

            $term = trim($request->term);
            $airports = DB::table('users')->select('id', 'name as text')
                ->where('name', 'LIKE',  '%' . $term . '%')
                ->orderBy('name', 'asc')->simplePaginate(20);
            $morePages = true;
            if (empty($airports->nextPageUrl())) {
                $morePages = false;
            }
            $results = array(
                "results" => $airports->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return response()->json($results);
        } else {
            // $users = User::where('type',2)->latest()->paginate(10);
            // // dd($users);
            // return view('admin.users', [
            //     'users' => $users
            // ]);
        }
    }
}
