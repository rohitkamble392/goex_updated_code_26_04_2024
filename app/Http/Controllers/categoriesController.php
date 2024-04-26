<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function allcategories()
    {
        $apiEndpoint = 'https://spillas.in/api/Master/GetCategory';
    
        $bearerToken = session('Token');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $categorydetails = $responseData; // Define $superstockistdetails here
    
            // Return the data to the view
            return view('pages.all-categories', compact('categorydetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    } 

    public function addCategory()
    {
        return view('pages.add-superstokist');
    }

    public function createCategory(Request $request)
    {
      
        $data = [
            'category_Name' => $request->input('category_Name'),
            // 'brand_ID' => 3,
        ];
        
        $apiEndpoint = 'https://spillas.in/api/Master/CreateCategory';

       $bearerToken = session('Token');
        // $bearerToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDgzNDc1NDEsImlzcyI6ImFwaWlzc3VlciIsImF1ZCI6ImFwaWF1ZGllbmNlIn0.a7jEGNbR4Ig8tADwIukJa4cDsp6tVejOqzzmfbpnrhI";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $superstokistDetails = $responseData;
            // dd($response);
            return redirect('/manage-categories')->with('success', 'Operation completed successfully!');
        } else {
            return $response->json();
        }
    }

    public function updatecategory(Request $request)
{
    $data = [
        'id' => $request->input('category_ID'),
        'category_Name' => $request->input('category_Name'),
        "brand_ID"=> 0
    ];
    // dd($data);

    $apiEndpoint = 'https://spillas.in/api/Master/UpdateCategory';

    $bearerToken = config('services.api.bearer_token');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Accept' => '*/*'
    ])->post($apiEndpoint,$data);

    if ($response->successful()) {
        $responseData = $response->json();
        $categorydetails = $responseData;
        // dd($response);
        return redirect('/manage-categories')->with('success', 'Operation completed successfully!');
    } else {
        // Handle the error
        return $response->json();
    }
}


}
