<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class productController extends Controller
{
    public function allproducts()
    {
    
        // return view('pages.all-products');

        $apiEndpoint = 'https://spillas.in/api/Master/GetProduct';
    
        $bearerToken = session('Token');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $productdetails = $responseData; // Define $distributorDetails here
            // dd($response);
            // Return the data to the view
            return view('pages.all-products', compact('productdetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function allproductsprice()
    {
    
        // return view('pages.all-products');

        $apiEndpoint = 'https://spillas.in/api/Master/GetProduct';
    
        $bearerToken = session('Token');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $productpricedetails = $responseData; // Define $distributorDetails here
            // dd($response);
            // Return the data to the view
            return view('pages.all-product-price', compact('productpricedetails'));
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function editproductprice($Product_Name)
    {
        return view('pages.edit-product-price-template');

        // $apiEndpoint = 'https://spillas.in/api/Master/GetPriceTemplate';
    
        // $bearerToken = session('Token');
    
        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $bearerToken,
        //     'Accept' => '*/*'
        // ])->get($apiEndpoint);
    
        // if ($response->successful()) {
        //     $responseData = $response->json();

            
        //     // Filter the result to find the matching Product_Name
        //     $matchedProduct = collect($responseData['Result'])->firstWhere('Product_Name', $Product_Name);
        //     // dd($matchedProduct);
    
        //     // Check if a matching product is found
        //     if ($matchedProduct) {

        //         // dd($matchedProduct);
        //         // Pass the matched product data to the view
        //         return view('pages.edit-product-price-template', compact('matchedProduct'));
        //     } else {
        //         return response()->json(['error' => 'Product not found'], 404);
        //     }
        // } else {
        //     return response()->json(['error' => 'Failed to fetch data'], $response->status());
        // }
    }
    
    // public function editproductprice($Product_Name)
    // {
    //     // return view('pages.edit-product-price-template');
    //     $apiEndpoint = 'https://spillas.in/api/Master/GetPriceTemplate';
    
    //     $bearerToken = session('Token');
    
    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $bearerToken,
    //         'Accept' => '*/*'
    //     ])->get($apiEndpoint);
        
    //     if ($response->successful()) {
    //         $responseData = $response->json();
    //         $pricetemplatedetails = $responseData; // Define $distributorDetails here
    //         dd($response);
    //         // Return the data to the view
    //         // return view('pages.edit-product-price-template', compact('productdetails'));
    //     } else {
    //         // Handle error response
    //         return response()->json(['error' => 'Failed to fetch data'], $response->status());
    //     }
    // }

    public function addProduct()
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
            return view('pages.add-product', compact('categories'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }

    }

    public function createProduct(Request $request)
    {
        $categoryValues = $request->input('categoryValues');

        $data = [
            'product_Name' => $request->input('product_Name'),
            'category_ID' => $categoryValues,
            'validity' => $request->input('validity'),
            'claims' => $request->input('claims'),
            'deviceAmount' => $request->input('deviceAmount'),
            'brand_ID' => 0,
            'amaCustomer' => $request->input('amaCustomer'),
            'noWarrenty' => $request->input('noWarrenty'),
        ];
        // dd($data);
        $apiEndpoint = 'https://spillas.in/api/Master/CreateProduct';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $productdetails = $responseData;
            // dd($response);
            // return redirect('/manage-distributor')->with('success', 'Operation completed successfully!');
            return redirect('/manage-products')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }
        // dd($categoryValues);
    }

    public function createpricetemplate(Request $request)
    {
        $productId = $request->input('id');
        $data = [
            "min"=> $request->input('min'),
            "max"=> $request->input('max'),
            "product_ID"=> $request->input('id'),
            "payoutper"=> $request->input('payoutper'),
            "mrp"=> $request->input('mrp'),
            "payoutAmt"=> $request->input('payoutAmt'),
            "empPayout"=> $request->input('empPayout'),
            "empAmt"=> $request->input('empAmt')
        ];
        // dd($data);
        $apiEndpoint = 'https://spillas.in/api/Master/CreatePriceTemplate';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $pricetemplatedetails = $responseData;
        //    dd($response);
            return redirect('/manage-product-price')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }
        // dd($categoryValues);
    }

    public function viewcategory()
    {
        return view('pages.view_category');
    }

    public function viewcategorydetails(Request $request)
    {
        $categoryID = $request->input('categoryID');
        $amount = $request->input('amount');
        
        $data =[
            "categoryID"=> $categoryID,
            "amount"=> $amount
        ];
        // dd($data);

        $apiEndpoint = 'https://spillas.in/api/Master/GetProuctTemplateDetails';

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

    public function getCategoryList()
    {
        $apiEndpoint = 'https://spillas.in/api/Master/GetCategory';
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
}
