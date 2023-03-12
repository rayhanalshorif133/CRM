<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirlineController extends Controller
{
    //
    public function getAirlines(Request $request)
    {
        // dd($request);
        if ($request->ajax()) {

            $term = trim($request->term);
            $airlines = DB::table('airlines')->select('id', 'Airline as text')
                ->where('Airline', 'LIKE',  '%' . $term . '%')
                ->orderBy('Airline', 'asc')->simplePaginate(20);
            // dd($airlines);
            $morePages = true;
            if (empty($airlines->nextPageUrl())) {
                $morePages = false;
            }
            $results = array(
                "results" => $airlines->items(),
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
