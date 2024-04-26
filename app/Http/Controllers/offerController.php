<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class offerController extends Controller
{
    public function alloffers()
    {

        $apiEndpoint = 'https://spillas.in/api/Master/GetOfferDetails';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $offerDetails = $responseData;

            // Return the data to the view

            // dd($response);
            return view('pages.all-offers', compact('offerDetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function addOffer()
    {
        return view('pages.add-offers');
    }

    public function CreateOffer(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'imagefile' => $request->input('imagefile'),
            'active' => $request->input('active'),
        ];

        $apiEndpoint = 'https://spillas.in/api/Master/CreateOffer';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $offerdetails = $responseData;
            // dd($response);
            return redirect('/manage-offers')->with('success', 'Operation completed successfully!');
        } else {
            return $response->json();
        }
    }
}
