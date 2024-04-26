<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Session;

class allkeyreportController extends Controller
{
    // public function getreportbyuserid()
    // {
    //     $data = [  
    //         "compID"=> 0,
    //         "roleID"=> 0,
    //         "userID"=> Session::get('UserID')
    //     ];
    //     $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetAllKeyReport';
    //     $bearerToken = session('Token');
    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $bearerToken,
    //         'Accept' => '*/*'
    //     ])->post($apiEndpoint, $data);
    //     if ($response->successful()) {
    //         $responseData = $response->json();
    //         $allkeyreportdetails = $responseData;
    //         // dd($allkeyreportdetails);
    //         return view('pages.all-key-report', compact('allkeyreportdetails'));
    //     } else {
    //         return response()->json(['error' => 'Failed to fetch data'], $response->status());
    //     }
    // }

        public function selfBalanceReport()
        {
            $userID = Session::get('UserID');

            // Conditionally set roleID based on userID
            $roleID = ($userID == env('ADMIN_ROLE_ID')) ? 1 : 0;

            $data = [  
                "compID" => 0,
                "roleID" => $roleID,    
                "userID" => $userID
            ];

            $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetAllKeyReport';
            $bearerToken = session('Token');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
                'Accept' => '*/*'
            ])->post($apiEndpoint, $data);

            if ($response->successful()) {
                $responseData = $response->json();
                $allkeyreportdetails = $responseData;
                // dd($allkeyreportdetails);
                return view('pages.self-balance-report', compact('allkeyreportdetails'));
            } else {
                return response()->json(['error' => 'Failed to fetch data'], $response->status());
            }
        }

        public function viewPolicyDetails($USerID)
        {
            $data = [
                "compID"=> 0,
                "roleID"=> 0,
                "userID"=> $USerID
            ];
            $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetAllKeyReport';
    
            $bearerToken = session('Token');
    
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
                'Accept' => '*/*'
            ])->post($apiEndpoint,$data);
    
            if ($response->successful()) {
                $responseData = $response->json();
                $viewPolicyDetails = $responseData;
                // dd($viewPolicyDetails);
                return view('pages.view-policy-details', compact('viewPolicyDetails'));
            } else {
                return response()->json(['error' => 'Failed to fetch data'], $response->status());
            }
        }
}
