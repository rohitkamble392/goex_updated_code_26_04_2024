<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class CountController extends Controller
{
    
    public function getCompanyCount()
    {    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCompanyDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);

      
        if ($response->successful()) {
            $responseData = $response->json();
            $companyDetails = $responseData['Result'];
            $recordCount = count($companyDetails);

            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getSuperStockistCount()
    {
        // dd(Session::all());
        $roleid = 0;

        if(Session::get('roleName') == env('ADMIN_ROLE_ID'))
        {
            $roleid = env('ADMIN_ROLE_ID');
        }
        else
        {
            $roleid = env('SUPERSTOCKIST_ROLE_ID');
        }
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            // "compID"=> 366,
            "roleID"=> $roleid,
            "seniorID"=> 0,
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperStockistDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $superstokistDetails = $responseData['Result'];
            $recordCount = count($superstokistDetails);

            // dd($recordCount);
            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getDistributorCount()
    {
                // dd(Session::all());
                $roleid = 0;

                if(Session::get('roleName') ==  env('ADMIN_ROLE_ID'))
                {
                    $roleid =  env('ADMIN_ROLE_ID');
                }
                else
                {
                     $roleid =  env('DISTRIBUTOR_ROLE_ID');;
                }
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            // "compID"=> 366,
            "roleID"=> $roleid,
            "seniorID"=> 0,
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetDistributorDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $distributorDetails = $responseData['Result'];
            $recordCount = count($distributorDetails);
            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getEmployeeCount()
    {
                        // dd(Session::all());
                        $roleid = 0;

                        if(Session::get('roleName') == 1)
                        {
                            $roleid =  env('ADMIN_ROLE_ID');
                        }
                        else
                        {
                            $roleid = 5;
                        }
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            // "compID"=> 366,
            "roleID"=> $roleid,
            "seniorID"=> 0,
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetEmployeeDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $employeeDetails = $responseData['Result'];
            $recordCount = count($employeeDetails);
            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getRetailerCount()
    {
                                // dd(Session::all());
                                $roleid = 0;

                                if(Session::get('roleName') == 1)
                                {
                                    $roleid =  env('ADMIN_ROLE_ID');
                                }
                                else
                                {
                                    $roleid =  env('RETAILER_ROLE_ID');
                                }
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            // "compID"=> 366,
            "roleID"=> $roleid,
            "seniorID"=> 0,
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperRetailerDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $retailerDetails = $responseData['Result'];
            $recordCount = count($retailerDetails);
            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getPromoterCount()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            // "compID"=> 366,
            "roleID"=> 13,
            "seniorID"=> 0,
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetPromoterDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $promoterDetails = $responseData['Result'];
            $recordCount = count($promoterDetails);
            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function getCustomerCount()
    {
        // dd(Session::all());
        $roleid = 0;

        if(Session::get('roleName') == env('ADMIN_ROLE_ID'))
        {
            $roleid =  env('ADMIN_ROLE_ID');
        }
        else
        {
            $roleid = 0;
        }
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            // "compID"=> 366,
            "roleID"=> $roleid,
            "seniorID"=> 0,
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCustomerDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $customerDetails = $responseData['Result'];
            $recordCount = count($customerDetails);
            
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getticketcount()    
    {
        $data = [
            "userId"=> 0,
            "flag"=> "string"
        ];
        $apiEndpoint = 'https://spillas.in/api/Incident/GetTicketList';    
        $bearerToken = session('Token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);
        if ($response->successful()) {
            $responseData = $response->json();
            $ticketlist = $responseData['Result'];
            $recordCount = count($ticketlist);
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function GettaskListCount()
    {
        $apiEndpoint = 'https://spillas.in/api/Incident/GettaskList';
        $bearerToken = session('Token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        if ($response->successful()) {
            $responseData = $response->json();
            $gettasklist = $responseData['Result'];
            $recordCount = count($gettasklist);
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }

    public function GetTicketReasonCount()
    {
        $apiEndpoint = 'https://spillas.in/api/Incident/GetTicketReason';
        $bearerToken = session('Token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        if ($response->successful()) {
            $responseData = $response->json();
            $getticketreason = $responseData['Result'];
            $recordCount = count($getticketreason);
            return response()->json(['count' => $recordCount]);
        } else {
            return response()->json([$response]);
        }
    }
}
