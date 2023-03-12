<?php

namespace App\Http\Controllers;

use App\Models\CompanyInformation;
use Illuminate\Http\Request;

class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_menu']      = 'basic_settings';
        $data['child_menu']     = 'company-information';
        $data['information']      = CompanyInformation::first();

        return view('basic_settings.company_information',$data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required'
        ]);

        $model = new CompanyInformation();
        $model->name            = $request->post('name');
        $model->address           = $request->post('address');
        $model->contact_number           = $request->post('contact_number');
        $model->email           = $request->post('email');
        $model->website           = $request->post('website');
        if($request->logo != null){
            $newImageName = time().'_company_logo.'.$request->logo->extension();
            $request->logo->move('upload/logo',$newImageName);

            $model->logo = 'upload/logo/'.$newImageName;
        }
        $model->save();

        $msg="Company Information Inserted.";
        $request->session()->flash('message',$msg);
        $request->session()->flash('type','success');

        return redirect('company-information');
    }

    
    public function update(Request $request, CompanyInformation $companyInformation)
    {
        $request->validate([
            'name'          => 'required',
            'id'          => 'required',
        ]);

        $model = CompanyInformation::find($request->post('id'));
        $model->name            = $request->post('name');
        $model->address           = $request->post('address');
        $model->contact_number           = $request->post('contact_number');
        $model->email           = $request->post('email');
        $model->website           = $request->post('website');
        if($request->logo != null){
            $newImageName = time().'_company_logo.'.$request->logo->extension();
            $request->logo->move('upload/logo',$newImageName);

            $model->logo = 'upload/logo/'.$newImageName;
        }
        $model->save();

        $msg="Company Information Updated.";
        $request->session()->flash('message',$msg);
        $request->session()->flash('type','success');

        return redirect('company-information');
    }

    
}
