<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index()
    {

        $data = [
            "companyID"=> 0,
            "enterpriseJson"=> "string",
            "enterpriseID"=> "LC0447ckpq",
            "qrFile"=> "string",
            "retailerID"=> 28
        ];

                $apiEndpoint = 'https://spillas.in/api/AMA/GetEnterprise_Details';

                
                $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

                if ($response->successful()) {

                    $responseData = $response->json();
                    $enterprisedetails = $responseData;
                    // dd($response);
                    return view('pages.all-enterprise', compact('enterprisedetails'));
                } else {
                    return response()->json(['error' => 'Failed to fetch data'], $response->status());
                }
    }

    public function getenterprisedetails()
    {
        return view('pages.get_enterprise_details');
    }

    public function companyenterprise()
    {
        return view('pages.company-enterprise-list');
    } 

    public function retailerenterprise()
    {
        return view('pages.retailer-enterprise-list');
    } 

    public function companyenterprisedetails(Request $request)
    {
        $companyID = $request->input('companyID');
        // dd($companyID);
        $data =[
            "companyID"=> $companyID,
            "enterpriseJson"=> "",
            "enterpriseID"=> "",
            "qrFile"=> "",
            "retailerID"=> 0,
            "resellerID"=> "",
            "configID"=> "",
            "zCompanyID"=> ""
        ];
        $apiEndpoint = 'https://spillas.in/api/AMA/GetCompanyEntprise';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        // dd($response);
        if ($response->successful()) {
         
            $details = $response->json();
                return $details;
        } else {
            return response()->json(['error' => $response]);
        }
    }

    public function retailerenterprisedetails(Request $request)
    {
        $retailerID = $request->input('retailerID');
        // dd($retailerID);
        $data =[
            "companyID"=> 0,
            "enterpriseJson"=> "",
            "enterpriseID"=> "",
            "qrFile"=> "",
            "retailerID"=> $retailerID,
            "resellerID"=> "",
            "configID"=> "",
            "zCompanyID"=> ""
        ];
        $apiEndpoint = 'https://spillas.in/api/AMA/GetEnterprise_Details';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        // dd($response);
        if ($response->successful()) {
         
            $details = $response->json();
                return $details;
        } else {
            return response()->json(['error' => $response]);
        }
    }
}
