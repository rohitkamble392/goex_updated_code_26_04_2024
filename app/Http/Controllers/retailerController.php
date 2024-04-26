<?php

namespace App\Http\Controllers;
use App\Http\Requests\RetailerRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Session;

class RetailerController extends Controller
{
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
                            $roleid = 6;
                        }

        $data = [
            "userID"=> Session::get('UserID'),
            "fromdate"=> "2024-02-14T10:23:30.333Z",
            "todate"=> "2024-02-14T10:23:30.334Z",
            "compID"=> Session::get('Company_ID'),
            "roleID"=> $roleid,
            "seniorID"=> Session::get('Senior_ID'),
        ];

                $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperRetailerDetails';


                $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);
        
                if ($response->successful()) {
                    $retailerDetails = $response->json();
        
                    return view('pages.all-retailers', compact('retailerDetails'));
                } else {
                    return response()->json(['error' => 'Failed to fetch data'], $response->status());
                }
    }

    public function addRetailer()
    {
        return view('pages.add-retailer');

    }

    public function CreateRetailer(Request $request)
    {
        $data = [
            'shop_Name' => $request->input('shop_Name'),
            'contactPer_Name' => $request->input('contactPer_Name'),
            'address' => $request->input('address'),
            'pincode' => $request->input('pincode'),
            'location' => 'drgfjhkl',
            'state_id' => $request->input('state_id'),
            'district' => $request->input('district'),
            'email' => $request->input('email'),
            'mobileNo' => $request->input('mobileNo'),
            'password' => $request->input('password'),
            'gsT_No' => $request->input('gsT_No'),
            'aadhar_No' => $request->input('aadhar_No'),
            'paN_No' => $request->input('paN_No'),
            'display_No' => 'fasdfsafsda',
            'display_ContactName' => 'fgdsgsdfgdfs',
            'payment_No' => $request->input('payment_No'),
            'upI_No' => $request->input('upI_No'),
            'is_Zero' => $request->input('is_Zero'),
            'contact_id' => $request->input('contact_id'),
            'billing_address_id' => $request->input('billing_address_id'),
            'shipping_address_id' => $request->input('shipping_address_id'),
            'remarks' => 'ggfdgfd',
            'created_by' => Session::get('UserID'),
            'senior_id' => Session::get('UserID'),
            'company_ID' => Session::get('Company_ID'),
            'dob' => $request->input('payment_No'),
            'role' => 6,
            'latitude' => "0",
            'longitude' => "0",
            'companyDomain' => 'string',
            'companytoken' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MTE5ODM3NDgsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.RSfpqSi9v3wDGo8wI86CKpolAb514CpQuzE4DW6d6No',
        ];
        // dd($data);
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/CreateRetailer';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $retailerDetails = $responseData;
            // dd($response);
            return redirect('/manage-retailer')->with('success', 'Operation completed successfully!');
        } else {
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

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/DeleteRetailer';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();
            $retailerDetails = $responseData;

            return redirect('/manage-retailer')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }
    }

    public function edit($mobile)
    {
        $data = [
            'searchValue' => $mobile,
            'userId' => 0,
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/AutoSearchRetailer';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json()['Result'][0];
            $retailer = $responseData;

            return view('pages.edit-retailer', compact('retailer'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function updateRetailer(Request $request)
    {
        $data = [
            'ID' => $request->input('ID'),
            'Shop_Name' => $request->input('shop_Name'),
            'ContactPer_Name' => $request->input('contactPer_Name'),
            'Address' => $request->input('address'),
            'Pincode' => $request->input('pincode'),
            'Location' => 'drgfjhkl',
            'State_id' => $request->input('state_id'),
            'District' => $request->input('district'),
            'Email' => $request->input('email'),
            'MobileNo' => $request->input('mobileNo'),
            'password' => $request->input('password'),
            'GST_No' => $request->input('gsT_No'),
            'Aadhar_No' => $request->input('aadhar_No'),
            'PAN_No' => $request->input('paN_No'),
            'Display_No' => 'fasdfsafsda',
            'Display_ContactName' => 'fgdsgsdfgdfs',
            'Payment_No' => $request->input('payment_No'),
            'UPI_No' => $request->input('upI_No'),
            'Is_Zero' => 1,
            'Remarks' => 'ggfdgfd',
            'Created_by' => Session::get('UserID'),
            'Senior_id' => Session::get('UserID'),
            'company_ID' => Session::get('Company_ID'),
            'companyDomain' => 'string',
            'companytoken' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDgzNzAzNjYsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.85NRtNzVx_SyQS6ytyiQwqNPICAv7QMHrkiEPd-I1gw',
        ];

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/UpdateRetailer';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);
        

        if ($response->successful()) {
            $responseData = $response->json();
            $retailerDetails = $responseData;

            return redirect('/manage-retailer')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }
    }

    public function retailerEnterpriseList()
    {   
        $data = [
            "companyID"=> 0,
            "enterpriseJson"=> "",
            "enterpriseID"=> "",
            "qrFile"=> "",
            // "retailerID"=> 7,
            "retailerID"=> Session::get('UserID'),
            "resellerID"=> "",
            "configID"=> "",
            "zCompanyID"=> ""
        ];
        $apiEndpoint = 'https://spillas.in/api/AMA/GetEnterprise_Details';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();
            $retailerEneterpriseList = $responseData;
            // dd($viewcompanyretailer);
            return view('pages.retailerEnterpriseList', compact('retailerEneterpriseList'));
        } else {
            return response()->json(['error' => 'Failed to fkkketch data'], $response->status());
        }
    }
    

    public function viewcategory()
    {
        return view('pages.view_category');
    }

    public function viewcategorydetails(Request $request)
    {
        $data =[
            "retailer_ID"=> Session::get('UserID'),
            "mobileNo"=> $request->input('shop_Name')
        ];
        // dd($data);

        $apiEndpoint = 'https://spillas.in/api/Master/GetMobileCustDetails';

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
