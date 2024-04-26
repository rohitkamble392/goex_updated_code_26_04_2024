<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class emiDetailsController extends Controller
{
    public function emidetails()
    {
        return view('pages.emi-details');
    } 

    public function emidetailsdata(Request $request)
    {
        $searchValue = $request->input('searchValue');
        
        $data =[
            "reatilerID"=> 27,
            // "reatilerID"=> $searchValue,
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetFutureEMIDetails';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
                // dd($response);
            $details = $response->json();
                return $details;
        } else {
            return response()->json(['error' => $searchValue]);
        }
    }
}
