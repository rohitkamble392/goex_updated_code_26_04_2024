<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class policyController extends Controller
{
    public function policyreport()
{
    // return view('pages.policy-report');

    $data = [
        'userID' => 1,
    ];

    $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetRoleDetails';

    // Make a GET request to the API
    $bearerToken = config('services.api.bearer_token');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->post($apiEndpoint,$data);

    // Check if the request was successful
    if ($response->successful()) {
        $roleDetails = $response->json();

        // Return the data to the view
        return view('pages.policy-report', compact('roleDetails'));
    } else {
        // Handle error response
        return response()->json(['error' => 'Failed to fetch data'], $response->status());
    }
}

public function policylist()
{
    return view('pages.manage-policy');
}

public function databasepolicylist()
{

    $apiEndpoint = 'https://spillas.in/api/AMA/DatabasePolicyList';

    $bearerToken = session('Token');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->get($apiEndpoint);
    
    if ($response->successful()) {

        $responseData = $response->json();
        $databasepolicylist = $responseData;

        // Return the data to the view

        // dd($response);
        return view('pages.database_policy_list', compact('databasepolicylist'));
    } else {
        // Handle error response
        return response()->json(['error' => 'Failed to fetch data'], $response->status());
    }
}
}
