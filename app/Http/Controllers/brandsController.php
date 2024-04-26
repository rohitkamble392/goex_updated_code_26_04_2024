<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class brandsController extends Controller
{
    public function allbrands()
    {
    
        $apiEndpoint = 'https://spillas.in/api/Master/GetBrand';
    
        $bearerToken = session('Token');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $brandsdetails = $responseData; // Define $distributorDetails here
    
            // Return the data to the view
            return view('pages.all-brands', compact('brandsdetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function addBrand()
    {
        // return view('pages.add-product');

        $apiEndpoint = 'https://spillas.in/api/Master/GetCategory';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);

        // dd($response);
        if ($response->successful()) {
            $categories = $response->json();
            // dd($response);
            return view('pages.add-brand', compact('categories'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }

    }

        public function CreateBrand(Request $request)
    {

        $categoryValues = $request->input('categoryValues');
      
       
        $data = [
            'brand_Name' => $request->input('brand_Name'),
            'CategoryID' => $categoryValues
        ];

        $apiEndpoint = 'https://spillas.in/api/Master/CreateBrand';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $branddetails = $responseData;
          
            // return redirect('/manage-distributor')->with('success', 'Operation completed successfully!');
            return redirect('/manage-brands')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }


    }

    
}
