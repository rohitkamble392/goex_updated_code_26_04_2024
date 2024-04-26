<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Session;
use Artisan;

class LoginController extends Controller
{
  public function login(Request $request)
    {
        // Make API call to authenticate user
        $response = Http::post('https://spillas.in/api/Authenticate/AuthenticateUser', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $responseData = $response->json();

    //    dd($responseData);
            if ($response->successful() && $responseData['IsSuccess']) {

            $seniorID;

            if($responseData['Result']['Senior_ID'] === 1)
            {
                $seniorID = $responseData['Result']['UserID'];
            }
            else
            {
                $seniorID = $responseData['Result']['Senior_ID'];
            }


            session([
                'roleName' => $responseData['Result']['Role'],
                'UserID' => $responseData['Result']['UserID'],
                // 'companytoken' => $responseData['companytoken'],
                'Company_ID' => $responseData['Result']['Company_ID'],
                'Senior_ID' => $seniorID,
                'Token' => $responseData['Token'],
                'companyDomain' => $responseData['Result']['companyDomain'],
                'phoneNumber' => $responseData['Result']['PhoneNumber'],
                'Username' => $responseData['Result']['Username'],
            ]);

            $this->GetRight($responseData['Result']['Role']);
        $checkuser = $responseData['Result']['Role'];

        
        // dd($checkuser);
        $this->updateTokenInEnvFile($responseData['Token']);
        if ($checkuser == env('ADMIN_ROLE_ID')) {
            return redirect()->intended('/superadmin-dashboard');
        }
        if ($checkuser == env('COMPANY_ROLE_ID')) {

            return redirect()->intended('/company-dashboard');
        }
        if ($checkuser == env('SUPERSTOCKIST_ROLE_ID')) {
            return redirect()->intended('/superstokist-dashboard');
        }
        if ($checkuser == env('DISTRIBUTOR_ROLE_ID')) {
            return redirect()->intended('/distributor-dashboard');
        }
        if ($checkuser == env('RETAILER_ROLE_ID')) {
            return redirect()->intended('/retailer-dashboard');
        }
        if ($checkuser == env('PROMOTER_ROLE_ID')) {
            return redirect()->intended('/promoter-dashboard');
        }
        if ($checkuser == env('COMPANY_EMPLOYEE')) {
            return redirect()->intended('/company-employee-dashboard');
        }
    } else {
       return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);

    }
}

        public function logout(Request $request)
        {
          //  $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return $request->wantsJson()
                ? new Response('', 204)
                : redirect('/login');
        }
    
        public function showLoginForm()
        {
            return view('auth.login');
        }

        public function updateTokenInEnvFile($newToken)   
        {
            $pathToEnvFile = base_path('.env');

            File::put($pathToEnvFile, str_replace(
                'BEARER_TOKEN=' . env('BEARER_TOKEN'), // Replace existing token value
                'BEARER_TOKEN=' . $newToken, // Set new token value
                File::get($pathToEnvFile)
            ));
            
           Artisan::call('config:clear');
        
    }

    public function GetRight(int $role_ID)
    {
        $data = [
            "role_ID"=> $role_ID
        ];

        $apiEndpoint = 'https://spillas.in/api/Master/GetRight';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '/'
        ])->post($apiEndpoint,$data);
        
        if ($response->successful()) {
            $responseData = $response->json();
            $getrightdetails = $responseData['Result'];
            dd($getrightdetails);

            // return view('pages.all-rights', compact('getrightdetails'));
        } 
        else 
        {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
}