<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\Support\Carbon;

class reportController extends Controller
{
    public function manageCreditReport()
    {

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/CreditReport';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $admincreditreport = $responseData;

            // Return the data to the view

            // dd($response);
            return view('pages.admin-credit-report', compact('admincreditreport'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function manageDebitReport()
    {

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/DebitReport';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $admindebitreport = $responseData;

            // Return the data to the view

            // dd($response);
            return view('pages.admin-debit-report', compact('admindebitreport'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function ManageCreditKey()
    {

        // return view('pages.manage-credit-key');
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
            return view('pages.manage-credit-key', compact('roleDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function ManageDebitKey()
    {
        // return view('pages.manage-debit-key');
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
            return view('pages.manage-debit-key', compact('roleDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }



        // return view('pages.manage-credit-key');

    // public function ManageCreditKeydata(Request $request)
    //     {
    //         $currentDate = Carbon::today()->toIso8601ZuluString();

    //         $data = [
    //             // 'numberofKey' => $request->input('numberofKey'),
    //             'numberofKey'=>$request->input('numberofKey') ,
    //             'typeofKey'=>$request->input('typeofKey') ,
    //             'key_Rate'=>$request->input('key_Rate') ,
    //             'total_Amt'=>$request->input('total_Amt') ,
    //             'expiryDue'=>$request->input('expiryDue') ,
    //             'user_Type'=>$request->input('user_Type') ,
    //             'created_on'=>$currentDate,
    //             'created_By'=> Session::get('UserID'),
    //             'assign_To'=>$request->input('assign_To') ,
    //             'req_Mode'=>1,
    //             'givenBy'=> Session::get('UserID'),
    //             'warranty'=>$request->input('warranty') ,
    //             'pakageID'=>$request->input('pakageID') ,
    //         ];
            
    //         // dd($data);
    
    //         $apiEndpoint = 'https://spillas.in/api/UserRegistration/ManageCreditKey';
    
    //         $bearerToken = session('Token');
    
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . $bearerToken,
    //             'Accept' => '*/*'
    //         ])->post($apiEndpoint,$data);
    
    //         if ($response->successful()) {
               
    //             $responseData = $response->json();
    //             $creditkeydetails = $responseData;
    //             // dd($data);
    //             return redirect('/manage-credit-report')->with('success', 'Operation completed successfully!');
            
    //         } else {
    //             // Handle the error
    //             return redirect()->back()->with('error', 'Operation not completed successfully!');
    //         }
    //     }


    public function ManageCreditKeydata(Request $request)
{
    $currentDate = Carbon::today()->toIso8601ZuluString();

    $assignTo = $request->input('user_Type') == 1 ? Session::get('UserID') : $request->input('assign_To');

    $data = [
        'typeofKey' => $request->input('typeofKey'),
        'pakageID' => $request->input('PakageID'),
        'numberofKey' => $request->input('numberofKey'),
        'key_Rate' => $request->input('key_Rate'),
        'total_Amt' => $request->input('total_Amt'),
        'user_Type' => $request->input('user_Type'),
        'assign_To' => $assignTo,
        'expiryDue' => $request->input('expiryDue'),
        'created_on' => $currentDate,
        'created_By' => Session::get('UserID'),
        'req_Mode' => 1,
        'givenBy' => Session::get('UserID'),
        'warranty' => 1,
    ];

    // dd($data);

    $apiEndpoint = 'https://spillas.in/api/UserRegistration/ManageCreditKey';

    $bearerToken = session('Token');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->post($apiEndpoint, $data);

    if ($response->successful()) {
        $responseData = $response->json();
        $creditkeydetails = $responseData;
        // dd($creditkeydetails);
        return redirect('/self-balance-report')->with('success', 'Operation completed successfully!');
    } else {
        // Handle the error
        return redirect()->back()->with('error', 'Operation not completed successfully!');
    }
}



        public function ManageDebitKeydata(Request $request)
        {
            // $currentDate = new Date();
            // $isoStringDate = currentDate.toISOString();
            $currentDate = Carbon::today()->toIso8601ZuluString();

            $data = [
                // 'numberofKey' => $request->input('numberofKey'),
                'numberofKey'=>$request->input('numberofKey') ,
                'typeofKey'=>$request->input('typeofKey') ,
                'key_Rate'=>$request->input('key_Rate') ,
                'total_Amt'=>$request->input('total_Amt') ,
                'expiryDue'=>$request->input('expiryDue') ,
                'user_Type'=>$request->input('user_Type') ,
                'created_on'=>$currentDate,
                'created_By'=> Session::get('UserID'),
                'assign_To'=>$request->input('assign_To') ,
                'req_Mode'=>2,
                'givenBy'=> Session::get('UserID'),
                'warranty'=>$request->input('warranty') ,
                'pakageID'=>$request->input('pakageID') ,
            ]; 
    
            // dd($data);

            $apiEndpoint = 'https://spillas.in/api/UserRegistration/ManageDebitKey';
    
            $bearerToken = session('Token');
    
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
                'Accept' => '*/*'
            ])->post($apiEndpoint,$data);
    
            if ($response->successful()) {
               
                $responseData = $response->json();
                $debitkeydetails = $responseData;
                return redirect('/manage-debit-report')->with('success', 'Operation completed successfully!');
            
            } else {
                // Handle the error
                return redirect()->back()->with('error', 'Operation not completed successfully!');
            }
        }

        // public function checkBalance(Request $request)
        // {
        //     $checkbalance = $request->input('checkbalance');
            
        //     $data =[
        //         "compID"=> 0,
        //         "roleID"=> 0,
        //         "userID"=> $checkbalance
        //     ];
        //     $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetAllKeyReport';
    
        //     $bearerToken = config('services.api.bearer_token');
    
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . $bearerToken,
        //         'Accept' => '*/*'
        //     ])->post($apiEndpoint,$data);
        //     dd($response);
        //     if ($response->successful()) {
        //             // dd($response);
        //         $details = $response->json();
        //             return $details;
        //     } else {
        //         return response()->json(['error' => $searchValue]);
        //     }
        // }

        public function checkBalance(Request $request)
{
    $checkbalance = $request->input('checkbalance');
    
    $data =[
        "compID"=> 0,
        "roleID"=> 0,
        "userID"=> $checkbalance
    ];
    $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetAllKeyReport';

    $bearerToken = config('services.api.bearer_token');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->post($apiEndpoint, $data);

    if ($response->successful()) {
        $details = $response->json();
        return $details;
    } else {
        // Log the error for debugging
        \Log::error('API Error:', ['response' => $response->body()]);
        
        return response()->json(['error' => 'API Error'], 500);
    }
}

    
}
