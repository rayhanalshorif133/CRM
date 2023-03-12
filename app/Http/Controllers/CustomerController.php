<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($customer);
        $data['main_menu']      = 'deals';
        $data['child_menu']     = 'create-customer';
        $data['countries']      = Country::all();

        return view('deals.create_customer', $data);
        // return view('deals.create_deal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //
        $validated =  $request->validate([
            'mobile1' => 'required',
            'status' => '',
            'nid' => '',
            'birth_id' => '',
            'mobile1' => '',
            'mobile2' => '',
            'title' => 'required',
            'sur_name' => '',
            'given_name' => '',
            'father_name' => '',
            'mother_name' => '',
            'marital_status' => '',
            'spouse_name' => '',
            'gender' => '',
            'nationality' => '',
            'religion' => '',
            'blood_group' => '',
            'passport_no' => '',
            'date_of_birth' => '',
            'date_of_issue' => '',
            'date_of_expire' => '',
            'present_address' => '',
            'permanent_address' => '',
            'organization' => '',
            'designation' => '',
            'email' => '',
        ]);

        $isAjax = $request->ajax();
        // dd($request->all());
        try {
            $customer = Customer::create($validated);
            if ($customer) {
                // dd('hello');
                $customerId = $customer->id;
                if (!$isAjax) {
                    return redirect()->route('create-deal', $customerId);
                } else {
                    $response = array();
                    $response['error'] = false;
                    $response['message'] = 'Customer Info is saved successfully';
                    $response['redirect'] = '/new-deal/customer/' . $customerId;
                    return json_encode($response);
                }
            } else {
                if (!$isAjax) {
                    $response = array();
                    $response['error'] = true;
                    $response['message'] = 'Customer Info is not saved.';

                    return json_encode($response);
                } else {
                    return redirect()->back()->withErrors(['Customer info is not saved successfully. Please try again later.']);
                }
            }
        } catch (\Throwable $th) {
            if (!$isAjax) {
                return redirect()->back()->withErrors(['Customer info is not saved successfully. Please try again later.']);
            } else {
                $response = array();
                $response['error'] = true;
                $response['message'] = 'Customer Info is not saved.';

                return json_encode($response);
            }
        }
    }

    public function getCustomerByMobileNo($mobile)
    {
        $customer = Customer::where('mobile1', $mobile)->first();
        // dd($customer);
        if ($customer) {
            $response = array();
            $response['error'] = false;
            $response['data'] = $customer->toArray();
            return json_encode($response);
        } else {
            $response['error'] = true;
            $response['message'] = 'Not found';
            return json_encode($response);
        }
    }

    public function getCustomerByNid($nid)
    {
        $customer = Customer::where('nid', $nid)->first();
        // dd($customer);
        if ($customer) {
            $response = array();
            $response['error'] = false;
            $response['data'] = $customer->toArray();
            return json_encode($response);
        } else {
            $response['error'] = true;
            $response['message'] = 'Not found';
            return json_encode($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $validated =  $request->validate([
            'mobile1' => 'required',
            'status' => '',
            'nid' => '',
            'birth_id' => '',
            'mobile1' => '',
            'mobile2' => '',
            'title' => 'required',
            'sur_name' => '',
            'given_name' => '',
            'father_name' => '',
            'mother_name' => '',
            'marital_status' => '',
            'spouse_name' => '',
            'gender' => '',
            'nationality' => '',
            'religion' => '',
            'blood_group' => '',
            'passport_no' => '',
            'date_of_birth' => '',
            'date_of_issue' => '',
            'date_of_expire' => '',
            'present_address' => '',
            'permanent_address' => '',
            'organization' => '',
            'designation' => '',
            'email' => '',
        ]);

        $isAjax = $request->ajax();
        // dd($request->all());
        try {
            $customerUpdate = $customer->update($validated);
            if ($customerUpdate) {
                // dd('hello');
                $customerId = $customer->id;
                if (!$isAjax) {
                    return redirect()->route('create-deal', $customerId);
                } else {
                    $response = array();
                    $response['error'] = false;
                    $response['message'] = 'Customer Info is saved successfully';
                    $response['redirect'] = '/new-deal/customer/' . $customerId;
                    return json_encode($response);
                }
            } else {
                if (!$isAjax) {
                    $response = array();
                    $response['error'] = true;
                    $response['message'] = 'Customer Info is not saved.';

                    return json_encode($response);
                } else {
                    return redirect()->back()->withErrors(['Customer info is not saved successfully. Please try again later.']);
                }
            }
        } catch (\Throwable $th) {
            if (!$isAjax) {
                return redirect()->back()->withErrors(['Customer info is not saved successfully. Please try again later.']);
            } else {
                $response = array();
                $response['error'] = true;
                $response['message'] = 'Customer Info is not saved.';

                return json_encode($response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
