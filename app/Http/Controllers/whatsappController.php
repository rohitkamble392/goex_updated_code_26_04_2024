<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\Http\Request;

class whatsappController extends Controller
{

    public function getwhatsapptemplates()
    {
        $apiEndpoint = 'https://spillas.in/api/Master/GetTemplateDetails';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $templateDetails = $responseData;

            // Return the data to the view

            // dd($response);
            return view('pages.get-whatsapp-templates', compact('templateDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function addwhatsapptemplate()
    {
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
            return view('pages.add-whatsapp-template', compact('roleDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function createwhatsapptemplate(Request $request)
    {

        $param = substr($request->input('info'), 0, -1); 

        // dd($param);

        $data = [
            'templateName' => $request->input('templateName'),
            'apiKey' => $request->input('apiKey'),
            'senderNumber' => $request->input('senderNumber'),
            'appName' => $request->input('appName'),
            'templateID' => $request->input('templateID'),
            'forUse' => $request->input('forUse'),
            'roleID' => $request->input('roleID'),
            'parameter' => $param,
            'isActive' => $request->input('isActive'),
        ];

        $apiEndpoint = 'https://spillas.in/api/Master/CreateTemplate';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $templateDetails = $responseData;
            // dd($response);
            return redirect('/all-whatsapp-templates')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }
    }

    public function getTableColumns(Request $request)
    {
        $tableName = $request->input('tableName');

        $data =[
            "tableName"=> $tableName
        ];
        $apiEndpoint = 'https://spillas.in/api/UserRegistration/GetTableColumn';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

            if ($response->successful()) {
            $details = $response->json();
                return $details;
        } else {
            return response()->json(['error' =>"error"]);
        }
    }
}
