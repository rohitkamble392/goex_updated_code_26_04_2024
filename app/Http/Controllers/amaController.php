<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class amaController extends Controller
{
    public function uploadEnterpriseFile()
    {
        return view('pages.create-enterprise');
    }

    // public function uploadEnterpriseFileData(Request $request)
    // {
    //     $base64String = $request->input('base64String');
        
    //     $data =[
    //         "base64String"=> $base64String,
    //     ];

    //     $apiEndpoint = 'https://spillas.in/api/AMA/UploadEnterpriseFile';

    //     $bearerToken = config('services.api.bearer_token');

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $bearerToken,
    //         'Accept' => '*/*'
    //     ])->post($apiEndpoint,$data);

    //     if ($response->successful()) {
    //             dd($response);
    //         // $details = $response->json();
    //         //     return $details;
    //     } else {
    //         return response()->json(['error' => $searchValue]);
    //     }
    // }

    public function uploadEnterpriseFileData(Request $request)
    {
    // Get the file from the request
    $file = $request->file('file');

    // Check if file exists
    if (!$file) {
        return response()->json(['error' => 'File not provided'], 400);
    }

    // Read the file contents and convert to base64
    $base64String = base64_encode(file_get_contents($file->getRealPath()));

    // Prepare the data
    $data = [
        "base64String" => $base64String,
    ];

    $apiEndpoint = 'https://spillas.in/api/AMA/UploadEnterpriseFile';

    $bearerToken = config('services.api.bearer_token');

    // Create a new HTTP client instance
    $httpClient = new \Illuminate\Support\Facades\Http;

    $response = $httpClient->withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->post($apiEndpoint, $data);

    if ($response->successful()) {
        dd($response);
        // $details = $response->json();
        // return $details;
    } else {
        return response()->json(['error' => 'Failed to upload file'], $response->status());
    }
}

}
