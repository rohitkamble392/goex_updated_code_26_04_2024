<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class distributorController extends Controller
{
    // public function index()
    // {
    //     $data = [
    //         "userID"=> Session::get('UserID'),
    //         "fromdate"=> "2024-02-14T10:23:30.333Z",
    //         "todate"=> "2024-02-14T10:23:30.334Z",
    //         "compID"=> Session::get('Company_ID'),
    //         "roleID"=> 4,
    //         "seniorID"=> Session::get('Senior_ID'),
    //     ];
    //             // return view('pages.all-employees');

    //             $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetDistributorDetails';

                
    //             // Make a GET request to the API
    //             $bearerToken = session('Token');

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $bearerToken,
    //         'Accept' => '*/*'
    //     ])->post($apiEndpoint,$data);
        
    //             // Check if the request was successful
    //             if ($response->successful()) {
    //                 // $distributorDetails = $response->json();

    //                 $responseData = $response->json();
    //                 $distributorDetails = $responseData;
        
    //                 // Return the data to the view
    //                 return view('pages.all-distributors', compact('distributorDetails'));
    //             } else {
    //                 // Handle error response
    //                 return response()->json(['error' => 'Failed to fetch data'], $response->status());
    //             }
    // }

    public function index()
    {
        // dd(Session::all());
        $roleid = 0;

        if(Session::get('roleName') == 1)
        {
            $roleid =  env('ADMIN_ROLE_ID');
        }
        else
        {
             $roleid =  env('DISTRIBUTOR_ROLE_ID');;
        }

        $data = [
            "userID"=> Session::get('UserID'),
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            "roleID"=> $roleid,
            "seniorID"=> Session::get('Senior_ID'),
        ];
                // return view('pages.all-employees');

                $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetDistributorDetails';

                
                // Make a GET request to the API
                $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);
        
                // Check if the request was successful
                if ($response->successful()) {
                    // $distributorDetails = $response->json();

                    $responseData = $response->json();
                    $distributorDetails = $responseData;
        
                    // Return the data to the view
                    return view('pages.all-distributors', compact('distributorDetails'));
                } else {
                    // Handle error response
                    return response()->json(['error' => 'Failed to fetch data'], $response->status());
                }
    }


    public function addDistributor()
    {
        // return view('pages.add-distributor');
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
            return view('pages.add-distributor', compact('roleDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }

    }

    public function CreateDistributor(Request $request)
    {
        
        $data = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'mobileNo' => $request->input('mobileNo'),
            'password' => $request->input('password'),
            'aadhar_No' => '765123765987',
            'remarks' => 'testing',
            'created_by' => Session::get('UserID'),
            "senior_id"=> Session::get('UserID'),
            'role' => $request->input('reporting_to'),
            'state' => $request->input('state'),
            'pincode' => $request->input('pincode'),
            'district' => $request->input('district'),
            'companyDomain' => 'string',
            'companytoken' =>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MTE5ODM3NDgsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.RSfpqSi9v3wDGo8wI86CKpolAb514CpQuzE4DW6d6No",
            'company_ID' => Session::get('Company_ID'),
        ];

        // dd($data);

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/CreateDistributor';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $distributorDetails = $responseData;
            // dd($response);
            // return redirect('/manage-distributor')->with('success', 'Operation completed successfully!');
            return redirect('/manage-distributor')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }

    }

    public function delete($userid,$id)
    {
        $data = [
            'userID' => $userid,
            'id' => $id,
            'statusId' => 0
        ];

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/DeleteDistributor';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();
            $distributorDetails = $responseData;

            return redirect('/manage-distributor')->with('success', 'Operation completed successfully!');
        } else {
            return $response->json();
        }
    }

    public function edit($mobile)
    {
        $data = [
            'searchValue' => $mobile,
            'userId' => 0,
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/AutoSearchDistributor';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json()['Result'][0];
            $distributor = $responseData;

            return view('pages.edit-distributor', compact('distributor'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function updateDistributor(Request $request)
    {

        $data = [
            'ID' => $request->input('ID'),
            'Name' => $request->input('name'),
            'Address' => $request->input('address'),
            'Email' => $request->input('email'),
            'MobileNo' => $request->input('mobileNo'),
            'password' => $request->input('password'),
            'Aadhar_No' => '43243253',
            'Remarks' => 'testing',
            'Created_by' => Session::get('UserID'),
            'Senior_id' => Session::get('UserID'),
            'company_ID' => Session::get('Company_ID'),
            'Pincode' => $request->input('pincode'),
            'State' => $request->input('state'),
            'District' => $request->input('district'),
            'companyDomain' => 'string',
            'companytoken' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDgzNzAzNjYsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.85NRtNzVx_SyQS6ytyiQwqNPICAv7QMHrkiEPd-I1gw',
        ];

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/UpdateDistributor';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();
            $distributorDetails = $responseData;

            return redirect('/manage-distributor')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }
    }

    public function viewRetailer($USerID)
    {
        $data = [
            "userID"=> 0,
            "fromdate"=> "2024-04-26T04:56:33.103Z",
            "todate"=> "2024-04-26T04:56:33.103Z",
            "compID"=> 0,
            "roleID"=> 0,
            "seniorID"=> $USerID
        ];
        
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperRetailerDetails';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $distretailerdetails = $responseData;

            // dd($distretailerdetails);

            return view('pages.view-retailers', compact('distretailerdetails'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
}
