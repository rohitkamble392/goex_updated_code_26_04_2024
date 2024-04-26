<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class userListController extends Controller
{
    public function getSuperStockistList(Request $request)
    {

        $companyId =$request->input('companyId');
        $cId;
        if($companyId)
        {
            $cId = $companyId;
        }
        else
        {
           $cId = session('Company_ID');
        }
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> $cId,
            "roleID"=> 9,
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
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function getDistributorList()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=>0, // add company id from session here
            "roleID"=> 0,
            "seniorID"=> Session::get('UserID'),
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetDistributorDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function getCompanyEmployeeList()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-04-24T13:30:08.210Z",
            "todate"=> "2024-04-24T13:30:08.210Z",
            "compID"=> Session::get('UserID'),
            "roleID"=> 0,
            "seniorID"=> 0
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetEmployeeDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function getSuperStokistEmployeeList()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-04-24T13:30:08.210Z",
            "todate"=> "2024-04-24T13:30:08.210Z",
            "compID"=> 0,
            "roleID"=> 8,
            "seniorID"=> Session::get('UserID')
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetEmployeeDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function getDistributorEmployeeList()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-04-24T13:30:08.210Z",
            "todate"=> "2024-04-24T13:30:08.210Z",
            "compID"=> 0,
            "roleID"=> 9,
            "seniorID"=> Session::get('UserID')
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetEmployeeDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function getRetailerList()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=>0, // add company id from session here
            "roleID"=> env('RETAILER_ROLE_ID'),
            "seniorID"=> Session::get('UserID'),
        ];
    
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperRetailerDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint, $data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function getPromoterList()
    {
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=>366, // add company id from session here
            "roleID"=> env('PROMOTER_ROLE_ID'),
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
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function getCompanyList()
    {
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCompanyDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch 88'], $response->status());
        }
    }

    public function getProductList()
    {
        $apiEndpoint = 'https://spillas.in/api/Master/GetProduct';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch 88'], $response->status());
        }
    }

    public function getPackageList()
    {
        $apiEndpoint = 'https://spillas.in/api/AMA/GetPakageMaster';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch 88'], $response->status());
        }
    }

    public function getAllSuperStockist()
    {
        // dd(Session::all());
        $roleid = 0;
        $companyid = 0;

        if(Session::get('roleName') == 1)
        {
            $roleid =  env('ADMIN_ROLE_ID');
        }
        if(Session::get('roleName') == 2)
        {
            $companyid = Session::get('Company_ID');
        }
        else
        {
             $roleid =  env('SUPERSTOCKIST_ROLE_ID');;
        }

     //   dd(Session::get('roleName'));
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> $companyid,
            // "compID"=> 366,
            "roleID"=> (Session::get('roleName')),
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

            // dd($recordCount);
            
            return response()->json(['data' => $superstokistDetails]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getAllDistributor()
    {
        // dd(Session::all());
        $roleid = 0;
        $companyid = 0;

        if(Session::get('roleName') == 1)
        {
            $roleid =  env('ADMIN_ROLE_ID');
        }
        if(Session::get('roleName') == 2)
        {
            $companyid = Session::get('Company_ID');
        }
        else
        {
             $roleid =  env('SUPERSTOCKIST_ROLE_ID');;
        }

     //   dd(Session::get('roleName'));
        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> $companyid,
            // "compID"=> 366,
            "roleID"=> (Session::get('roleName')),
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

            // dd($recordCount);
            
            return response()->json(['data' => $distributorDetails]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getAllEmployee()
    {
        $roleid = 0;
        $companyid = 0;

        if(Session::get('roleName') == 1)
        {
            $roleid =  env('ADMIN_ROLE_ID');
        }
        if(Session::get('roleName') == 2)
        {
            $companyid = Session::get('Company_ID');
        }
        else
        {
             $roleid =  env('SUPERSTOCKIST_ROLE_ID');;
        }

        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> $companyid,
            "roleID"=> (Session::get('roleName')),
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

            // dd($recordCount);
            
            return response()->json(['data' => $employeeDetails]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getAllRetailer()
    {
        $roleid = 0;
        $companyid = 0;

        if(Session::get('roleName') == 1)
        {
            $roleid =  env('ADMIN_ROLE_ID');
        }
        if(Session::get('roleName') == 2)
        {
            $companyid = Session::get('Company_ID');
        }
        else
        {
             $roleid =  env('SUPERSTOCKIST_ROLE_ID');;
        }

        $data = [  
            "userID"=> 0,
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> $companyid,
            "roleID"=> (Session::get('roleName')),
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

            // dd($recordCount);
            
            return response()->json(['data' => $retailerDetails]);
        } else {
            return response()->json([$response]);
        }
    }

    public function getpages()
    {
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCompanyDetails';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch 88'], $response->status());
        }
    }

    public function getticketreason()
    {
        $apiEndpoint = 'https://spillas.in/api/Incident/GetTicketReason';
        $bearerToken = session('Token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $data = $responseData['Result'];
            
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to fetch 88'], $response->status());
        }
    }

    // public function getselfassignkey()
    // {
    //     $data = [  
    //         "compID"=> 0,
    //         "roleID"=> 8,
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
    //         $data = $responseData['Result'];
            
    //         return response()->json(['data' => $data]);
    //     } else {
    //         return response()->json(['error' => 'Failed to fetch data'], $response->status());
    //     }
    // }

    public function getselfassignkey()
{
    $data = [  
        "compID"=> 0,
        "roleID"=> 8,
        "userID"=> Session::get('UserID')
    ];

    $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetAllKeyReport';
    $bearerToken = session('Token');
    
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->post($apiEndpoint, $data);
    
    if ($response->successful()) {
        $responseData = $response->json();
        $data = $responseData['Result'];
        
        return response()->json(['Result' => $data]);
    } else {
        return response()->json(['error' => 'Failed to fetch data'], $response->status());
    }
}

    
    //table data
}
