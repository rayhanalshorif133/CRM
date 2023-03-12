<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubServices;
use Illuminate\Http\Request;

class SubServicesController extends Controller
{
    public function index()
    {
        $data['main_menu']          = 'basic_settings';
        $data['child_menu']         = 'sub-service-list';
        $data['services']           = Service::where('status',1)->get();
        $data['sub_services']       = SubServices::with('service')->get();

        return view('basic_settings.sub_service',$data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'service_id'    => 'required'
        ]);

        $model = new SubServices();
        $model->service_id       = $request->post('service_id');
        $model->name            = $request->post('name');
        $model->created_by      = auth()->user()->id;
        $model->save();

        $msg="New Sub Service Inserted.";
        $request->session()->flash('message',$msg);
        $request->session()->flash('type','success');

        return redirect('sub-service-list');
    }

   
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'          => 'required',
            'id'          => 'required',
            'service_id'    => 'required'
        ]);

        $model = SubServices::find($request->post('id'));
        $model->service_id      = $request->post('service_id');
        $model->name            = $request->post('name');
        $model->updated_by      = auth()->user()->id;
        $model->save();

        $msg="Sub Service Updated.";
        $request->session()->flash('message',$msg);
        $request->session()->flash('type','success');

        return redirect('sub-service-list');
    }

    public function load_sub_service(Request $request){
        $data['sub_services'] = SubServices::where('service_id',$request->post('service_id'))->where('status',1)->get();
        return view('basic_settings.load_sub_service',$data);
    }
}
