<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class companyController extends Controller
{
    public function index()
    {
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetCompanyDetails';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $companyDetails = $responseData;

            // Return the data to the view

            // dd($response);
            return view('pages.all-companies', compact('companyDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function getCompanyEnterprise()
    {

        $data = [
            "companyID"=> Session::get('companyID'),
            "enterpriseJson"=> "string",
            "enterpriseID"=> "LC0447ckpq",
            "qrFile"=> "string",
            "retailerID"=> 0
        ];

                $apiEndpoint = 'https://spillas.in/api/AMA/GetCompany_Enterprise';

                $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

                if ($response->successful()) {

                    $responseData = $response->json();
                    $enterprisedetails = $responseData;
                    // dd($response);
                    return view('pages.getcompany-enterprise', compact('getcompanyenterprise'));
                } else {
                    return response()->json(['error' => 'Failed to fetch data'], $response->status());
                }
    }

    public function addCompany()
    {
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetRoleDetails';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,[
            'userID' => 1,
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            $roleDetails = $responseData;

            return view('pages.add-company', compact('roleDetails'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function createCompany(Request $request)
    {
        $data = [
            'com_Name' => $request->input('com_Name'),
            'com_Email' => $request->input('com_Email'),
            'com_MobileNo' => $request->input('com_MobileNo'),
            'password' => $request->input('password'),
            'type_Buss' => $request->input('type_Buss'),
            'com_Address' => $request->input('com_Address'),
            'createdBy' => 1,
            'ownerName' => $request->input('ownerName'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'panNo' => $request->input('panNo'),
            'nationality' => $request->input('nationality'),
            'gender' => $request->input('gender'),
            'role' => $request->input('role'),
            'fileUploadURL' => $request->input('fileUploadURL'),
            'autoziedName' => $request->input('autoziedName'),
            'pincode' => $request->input('pincode'),
            'state' => $request->input('state'),
            'district' => $request->input('district'),
            'typeofCom' => $request->input('typeofCom'),
            'gstno' => $request->input('gstno'),
            'webSiteURL' => $request->input('webSiteURL'),
            'uploadLogo' => $request->input('uploadLogo'),
            'gsT_URL' => $request->input('gsT_URL'),
            'companno' => $request->input('companno'),
            'compannO_URL' => $request->input('compannO_URL'),
            'authPANNO_URL' => $request->input('authPANNO_URL'),
            'authPANNO' => $request->input('authPANNO'),
            'cinno' => $request->input('cinno'),
            'cinnO_URL' => $request->input('cinnO_URL'),
            'subdoM1' => $request->input('subdoM1'),
            'subdoM2' => $request->input('subdoM2'),
            'subdoM3' => $request->input('subdoM3'),
            'enterPrise_ID' => $request->input('enterPrise_ID'),
            'pannO_URL' => $request->input('pannO_URL'),
            'aadharCard_URL' => $request->input('aadharCard_URL'),
            'aadharCardNO' => $request->input('aadharCardNO'),
            'companyDomain' => 'string',
            'companytoken' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDcyMjcyMDUsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.dfKEoCUgNVson_hN_mJqvdYVirH9ojhLFNeO4E1EZNw',
        ]; 

        dd($data);

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/CreateCompany';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
           
            $responseData = $response->json();
            $companytDetails = $responseData;

            return redirect('/manage-company')->with('success', 'Operation completed successfully!');
        
        } else {
            // Handle the error
            return redirect()->back()->with('error', 'Operation not completed successfully!');
        }
    }

    public function createEnterprise(Request $request)
    {
        $data = [
            'EnterpriseID' => $request->input('EnterpriseID'),
            'RetailerID' => $request->input('RetailerID'),
            'jsonfile' => $request->input('jsonfile'),
            'QRfile' => $request->input('QRfile'),
            "companid"=> Session::get('Company_ID'),
        ]; 

        $apiEndpoint = 'https://spillas.in/api/AMA/UploadJson';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
           
            $responseData = $response->json();
            $jsondetails = $responseData;

            dd($response);
            // return redirect('/manage-enterprise')->with('success', 'Operation completed successfully!');
        
        } else {
            // Handle the error
            return redirect()->back()->with('error', 'Operation not completed successfully!');
        }
    }
    

    public function UpdateCompany(Request $request)
    {
        $data = [
            'companyID' => $request->input('companyID'),
            'com_Name' => $request->input('com_Name'),
            'com_Email' => $request->input('com_Email'),
            'com_MobileNo' => $request->input('com_MobileNo'),
            'password' => $request->input('password'),
            'type_Buss' => $request->input('type_Buss'),
            'com_Address' => $request->input('com_Address'),
            'createdBy' => Session::get('userID'),
            'ownerName' => $request->input('ownerName'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'panNo' => $request->input('panNo'),
            'nationality' => $request->input('nationality'),
            'gender' => $request->input('gender'),
            'role' => $request->input('role'),
            'fileUploadURL' => $request->input('fileUploadURL'),
            'autoziedName' => $request->input('autoziedName'),
            'pincode' => $request->input('pincode'),
            'state' => $request->input('state'),
            'district' => $request->input('district'),
            'typeofCom' => $request->input('typeofCom'),
            'gstno' => $request->input('gstno'),
            'webSiteURL' => $request->input('webSiteURL'),
            'uploadLogo' => $request->input('uploadLogo'),
            'gsT_URL' => $request->input('gsT_URL'),
            'companno' => $request->input('companno'),
            'compannO_URL' => $request->input('compannO_URL'),
            'authPANNO_URL' => $request->input('authPANNO_URL'),
            'authPANNO' => $request->input('authPANNO'),
            'cinno' => $request->input('cinno'),
            'cinnO_URL' => $request->input('cinnO_URL'),
            'subdoM1' => $request->input('subdoM1'),
            'subdoM2' => $request->input('subdoM2'),
            'subdoM3' => $request->input('subdoM3'),
            'enterPrise_ID' => $request->input('enterPrise_ID'),
            'pannO_URL' => $request->input('pannO_URL'),
            'aadharCard_URL' => $request->input('aadharCard_URL'),
            'aadharCardNO' => $request->input('aadharCardNO'),
            'companyDomain' => 'string',
            'companytoken' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDcyMjcyMDUsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.dfKEoCUgNVson_hN_mJqvdYVirH9ojhLFNeO4E1EZNw',
        ];

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/UpdateCompany';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);


        if ($response->successful()) {
            $responseData = $response->json();
            $companyDetails = $responseData;

            return redirect()->back()->with('success', 'Operation completed successfully!');
        
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
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/AutoSearchCompany';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json()['Result'][0];
            $company = $responseData;

            return view('pages.edit-company', compact('company'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function delete($userid,$id)
    {
        $data = [
            'userID' => $userid,
            'id' => $id,
            'statusId' => 0
        ];

        $apiEndpoint = 'https://spillas.in/api/UserRegistration/DeleteCompany';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();
            $companyDetails = $responseData;

            return redirect('/manage-company')->with('success', 'Operation completed successfully!');
        } else {
            return $response->json();
        }
    }

    public function viewCompanyRetailer($User_id)
    {
        $data = [
            "userID"=> 0,
            "fromdate"=> "2024-04-08T04:33:05.067Z",
            "todate"=> "2024-04-08T04:33:05.067Z",
            "compID"=> $User_id,
            "roleID"=> 0,
            "seniorID"=> 0
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetSuperRetailerDetails';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json()['Result'];
            $viewcompanyretailer = $responseData;
            // dd($viewcompanyretailer);
            return view('pages.view-company-retailer', compact('viewcompanyretailer'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function uploadRetailerDetailsData($USerID)
    {   
        // dd($USerID);
        // return view('pages.upload-files');
        $data = [
            "companyID"=> 0,
            "enterpriseJson"=> "",
            "enterpriseID"=> "",
            "qrFile"=> "",
            // "retailerID"=> 7,
            "retailerID"=> $USerID,
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
            $viewcompanyretailerenterprise = $responseData;
            // dd($viewcompanyretailer);
            return view('pages.upload-files', compact('viewcompanyretailerenterprise'));
        } else {
            return response()->json(['error' => 'Failed to fkkketch data'], $response->status());
        }
    }

    // public function uploadRetailerDetailsData(Request $request)
    // {   
    //     $data = [
    //         'companid' => $request->input('companid'),
    //         'EnterpriseID' => $request->input('EnterpriseID'),
    //         'RetailerID' => $request->input('RetailerID'),
    //         'ResellerID' => $request->input('ResellerID'),
    //         'ConfigID' => $request->input('ConfigID'),
    //         'ZCompanyID' => $request->input('ZCompanyID'),
    //         'jsonfile' => $request->input('jsonfile'),
    //         'QRfile' => $request->input('QRfile'),
    //     ]; 

    //     $apiEndpoint = 'https://spillas.in/api/AMA/UploadJson';
    //     try {
    //         $response = Http::post($apiEndpoint,$data);
    //         dd($response);
    //         if ($response->successful()) {
    //             $details = $response->json();
    //             // return response()->json($details);
    //             return view('pages.upload-files');

    //         } else {
    //             return response()->json(['error' => 'Faighghghghgled to fetch data from the API'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function uploadImage(Request $request)
{
    // $imageFile = $request->file('image');
    $jsonFile = $request->file('jsonfile');
    $qrFile = $request->file('QRfile');
    
    // Check if all required input fields and files are provided
    $requiredFields = ['companid', 'EnterpriseID', 'RetailerID', 'ResellerID', 'ConfigID', 'ZCompanyID'];
    $requiredFiles = ['jsonfile', 'QRfile'];
    
    foreach ($requiredFields as $field) {
        if (!$request->has($field)) {
            return response()->json(['message' => "$field is missing"], 400);
        }
    }
    
    foreach ($requiredFiles as $fileField) {
        if (!$request->hasFile($fileField)) {
            return response()->json(['message' => "$fileField is missing"], 400);
        }
    }

    if ($jsonFile && $qrFile) {
    // if ($imageFile && $jsonFile && $qrFile) {
        $bearerToken = config('services.api.bearer_token');
       
        $response = Http::withToken($bearerToken)
        ->withHeaders([
            'Accept' => 'application/json', 
        ])
        ->attach(
            'image',
            file_get_contents($imageFile->getPathname()),
            $imageFile->getClientOriginalName()
            // file_get_contents($imageFile->getPathname()),
            // $imageFile->getClientOriginalName()
        )
        ->attach(
            'jsonfile',
            file_get_contents($jsonFile->getPathname()),
            $jsonFile->getClientOriginalName()
        )
        ->attach(
            'QRfile',
            file_get_contents($qrFile->getPathname()),
            $qrFile->getClientOriginalName()
        )
        ->post('https://spillas.in/api/UserRegistration/UploadFile', [
            'companid' => $request->input('companid'),
            'EnterpriseID' => $request->input('EnterpriseID'),
            'RetailerID' => $request->input('RetailerID'),
            'ResellerID' => $request->input('ResellerID'),
            'ConfigID' => $request->input('ConfigID'),
            'ZCompanyID' => $request->input('ZCompanyID'),
        ]);
    
        // Uncomment below line for debugging
        // dd($response->status(), $response->body(), $response->json());

        if ($response->successful()) {
            return response()->json(['message' => $response->body()]);
        } else {
            return response()->json(['message' => 'Failed to upload files'], $response->status());
        }
    } else {
        return response()->json(['message' => 'Required files are missing'], 400);
    }
}

}
