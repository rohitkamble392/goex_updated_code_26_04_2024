<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class companywiseretailerController extends Controller
{
    public function companywiseretailer()
    {
        return view('pages.company-data');
    } 

    public function companywiseretailerdata(Request $request)
    {
        $compID = $request->input('compID');
        // dd($compID);
        $data =[
            "userID"=> 0,
            "fromdate"=> "2024-04-08T04:33:05.067Z",
            "todate"=> "2024-04-08T04:33:05.067Z",
            "compID"=> $compID,
            "roleID"=> 0,
            "seniorID"=> 0
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperRetailerDetails';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

      
        if ($response->successful()) {
            $details = $response->json();
            // dd($response);
                return $details;
        } else {
            return response()->json(['error' => $searchValue]);
        }
    }
}
