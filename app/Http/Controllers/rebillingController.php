<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rebillingController extends Controller
{
    public function new_onboarding()
    {
        return view('pages.new_onboarding');
    }

    public function edit_onboarding()
    {
        return view('pages.edit_new_onboarding');
    }

    public function used_policy()
    {
        return view('pages.used_policy_details');
    }

    public function edit_used_policy()
    {
        return view('pages.edit_used_policy_details');
    }

    public function not_used_policy()
    {
        return view('pages.not_used_policy_details');
    }

    public function edit_not_used_policy()
    {
        return view('pages.edit_not_used_policy_details');
    }

    public function balanced_policy()
    {
        return view('pages.balanced-policy');
    }

    public function edit_balanced_policy()
    {
        return view('pages.edit_balanced_policy');
    }

    public function request_policy()
    {
        return view('pages.request_policy');
    }

    public function edit_request_policy()
    {
        return view('pages.edit_request_policy');
    }
}
