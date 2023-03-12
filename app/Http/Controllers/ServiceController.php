<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index()
    {
        $data['main_menu']          = 'basic_settings';
        $data['child_menu']         = 'service-list';
        $data['service_data']        = Service::all();

        return view('basic_settings.service',$data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required'
        ]);

        $model = new Service();
        $model->name            = $request->post('name');
        $model->created_by      = auth()->user()->id;
        $model->save();

        $msg="New Service Inserted.";
        $request->session()->flash('message',$msg);
        $request->session()->flash('type','success');

        return redirect('service-list');
    }

   
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'          => 'required',
            'id'          => 'required'
        ]);

        $model = Service::find($request->post('id'));
        $model->name            = $request->post('name');
        $model->updated_by      = auth()->user()->id;
        $model->save();

        $msg="Service Updated.";
        $request->session()->flash('message',$msg);
        $request->session()->flash('type','success');

        return redirect('service-list');
    }

    
}
