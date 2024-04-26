<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
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
                            $ticketlist = $responseData;
                
                            return view('pages.all-tickets', compact('ticketlist'));
                        } else {
                            return response()->json(['error' => 'Failed to fetch data'], $response->status());
                        }
    }


    public function raiseTicketView()
    {
        return view('pages.raise-ticket');
    }
    
    public function autosearchretailer(Request $request)
    {

        $searchValue = $request->input('searchValue');
        $data =[
            'searchValue' => $searchValue,
            'userID' => 1
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/AutoSearchRetailer';

        $bearerToken = config('services.api.bearer_token');

        

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

            if ($response->successful()) {
            $details = $response->json();
                return $details;
        } else {
            return response()->json(['error' => $searchValue]);
        }
    }
    
    // public function autosearchcustomer(Request $request)
    // {
    //     $searchValue1 = $request->input('searchValue1');
    //     $searchValue2 = $request->input('searchValue2');
    //     $data = [
    //         // 'searchValue1' => $searchValue1,
    //         'roleID' => $searchValue2,
    //     ];
    //     // dd($data);
    //     $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCustomerDetails';

    //     $bearerToken = config('services.api.bearer_token');


    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $bearerToken,
    //         'Accept' => '*/*'
    //     ])->post($apiEndpoint,$data);
    //     // dd($response);
    //         if ($response->successful()) {
    //         $details = $response->json();
    //             return $details;
    //     } else {
    //         return response()->json(['error' => $roleID]);
    //     }
    // }

    public function autosearchcustomer(Request $request)
{
    $searchValue1 = $request->input('searchValue1');
    $searchValue2 = $request->input('searchValue2');
    $data = [
        'roleID' => $searchValue2,
    ];

    $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCustomerDetails';
    $bearerToken = config('services.api.bearer_token');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => 'application/json', // Set appropriate accept header
    ])->post($apiEndpoint, $data);

    if ($response->successful()) {
        $details = $response->json();
        // Filter the response data based on searchValue1
        $filteredDetails = array_filter($details, function ($item) use ($searchValue1) {
            return strpos($item['your_key'], $searchValue1) !== false;
        });

        return response()->json($filteredDetails);
    } else {
        // Handle error response
        return response()->json(['error' => 'Failed to retrieve data'], $response->status());
    }
}


    // public function autosearchcustomer(Request $request)
    // {
    //     $searchValue = $request->input('searchValue');
    //     $data = [
    //         'searchValue' => $searchValue,
    //         'userID' => 0
    //     ];

    //     // $data = [
    //     //     "reatilerID"=> 404,
    //     //     "fromdate"=> "2024-02-18T09:32:32.684Z",
    //     //     "todate"=> "2024-02-18T09:32:32.684Z",
    //     //     "compID"=> 0,
    //     //     "roleID"=> $roleid,
    //     //     "promotorID"=> 405,
    //     //     "seniorID"=> 405
    //     // ];
    //             $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCustomerDetails';
                
    //             // Make a GET request to the API
    //             $bearerToken = session('Token');

    //             $response = Http::withHeaders([
    //                 'Authorization' => 'Bearer ' . $bearerToken,
    //                 'Accept' => '*/*'
    //             ])->post($apiEndpoint,$data);
        
    //             // Check if the request was successful
    //             if ($response->successful()) {
    //                 $responseData = $response->json();

    //                 $customerDetails = $responseData;
    //                 // dd($response);
    //                 // Return the data to the view
    //                 return view('pages.all-customers', compact('customerDetails'));
    //             } else {
    //                 // Handle error response
    //                 return response()->json(['error' => 'Failed to fetch data'], $response->status());
    //             }
    // }

    public function CreateTicket(Request $request)
    {
        $data = [
            'ticketReason' => $request->input('ticketReason'),
            'comment' => $request->input('comment'),
            'mobileNo' => $request->input('mobileNo'),
            'status' => 0,
            'assignTO' => 0,
            'task_id' => 0,
            'created_by' => Session::get('UserID'),
        ];

        // dd($data);

        $apiEndpoint = 'https://spillas.in/api/Incident/RaiseTicket';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $raiseticket = $responseData;
            // dd($response);
            return redirect('/all-tickets')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }

    }

    public function resolvedticket($TicketID)
    {
        return view('pages.resolved-ticket', compact('TicketID'));
    }
    
    public function createResolvedTicket(Request $request)
    {
        $data = [
            "ticketID"=> $request->input('ticketID'),
            "status"=> 1,
            "resolvedBy"=> 0,
            'resolved_Remarks' => $request->input('resolved_Remarks'),
            'resolvedComment' => $request->input('resolvedComment'),
        ];
        
        // dd($data);

        $apiEndpoint = 'https://spillas.in/api/Incident/ResolvedTicket';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();
            $resolvedTicket = $responseData;
            // dd($resolvedTicket);
            // return view('pages.all-tickets', compact('ticketlist'));
            return redirect('/all-tickets')->with('success', 'Operation completed successfully!');
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }    
}