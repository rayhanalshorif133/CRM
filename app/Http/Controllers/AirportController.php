<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirportController extends Controller
{
    //
    public function getAirports(Request $request)
    {
        // dd($request);
        if ($request->ajax()) {

            $term = trim($request->term);
            $airports = DB::table('airports')->select('id', 'name as text')
                ->where('name', 'LIKE',  '%' . $term . '%')
                ->orderBy('name', 'asc')->simplePaginate(20);
            // dd($airports);
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
