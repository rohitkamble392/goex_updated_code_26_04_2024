@extends('layouts.main') 
@section('title', 'Manage Whatsapp Template')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Create Template')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{ route('create-template') }}">
                        @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="templateName">{{ __('template Name')}}</label>
                                    <input type="text" name="templateName" id="templateName" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="apiKey">{{ __('API Key')}}</label>
                                    <input type="text" name="apiKey" id="apiKey" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="senderNumber">{{ __('Sender Number')}}</label>
                                    <input type="text" name="senderNumber" id="senderNumber" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="appName">{{ __('App Name')}}</label>
                                    <input type="text" name="appName" id="appName" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="templateID">{{ __('Template ID')}}</label>
                                    <input type="text" name="templateID" id="templateID" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="forUse">{{ __('For Use')}}</label>
                                    <select name="forUse" id="forUse" class="form-control">
                                        <option value="">Select Use Case</option>
                                        <option value="1">Retailer Registration</option>
                                        <option value="2">Policy Assign</option>
                                        <option value="3">Low Policy Balance</option>
                                        <option value="4">Birthday Wish</option>
                                        <option value="5">Company Offer</option>
                                        <option value="6">Welcome Message</option>
                                        <option value="7">Payment Due</option>
                                        <option value="8">Payment Paid</option>
                                        <option value="9">Payment Reminder</option>
                                        <option value="10">Promotional Activity</option>
                                        <option value="11">Not Using</option>
                                        <option value="12">Deactivation</option>
                                        <option value="13">Warranty Purchase</option>
                                        <option value="14">Key Assign</option>
                                        <option value="15">Key Pull Back</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="roleID">{{ __('Select Role')}}<span class="text-red">*</span></label>
                                    <select name="roleID" id="roleID" class="form-control">
                                        @foreach ($roleDetails['Result'] as $role)
                                            <option value="{{ $role['RoleID'] }}">{{ $role['RoleName'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="isActive">{{ __('isActive')}}<span class="text-red">*</span></label>
                                    <select name="isActive" id="isActive" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <label for="formGroup" class="col-form-label">Parameters</label>
                            <div id="formGroup" class="form-group row">
                                <div class="col-sm-3">
                                    <select name="tbl_Retailer" id="tbl_Retailer" class="form-control dp">
                            
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="tbl_Customer" id="tbl_Customer" class="form-control dp">

                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="MobileDeviceDetails" id="MobileDeviceDetails" class="form-control dp">

                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="Assginpolicy" id="Assginpolicy" class="form-control dp">

                                    </select>
                                </div>
                                <div class="col-sm-3 mt-4">
                                    <select name="TBl_ProductMaster" id="TBl_ProductMaster" class="form-control dp">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" style="width:100%" name="info" id="info" cols="20" rows="5"></textarea>                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(".dp").on("change", function() {
            var $select = $(this);
            var textBoxID = $(this).attr('id');
            $("#info").val(function(i, val) {
                return val += textBoxID+"."+$select.val()+", ";
            })
        });
        
        $(document).ready(function () { 
            $.ajax({
                url: '/get-table-columns',
                type: 'GET',
                data: {
                    tableName: "tbl_Retailer",
                },
                success: function (response) {
                    console.log(response);
                    response.Result.forEach(function (column) {
                        $('#tbl_Retailer').append('<option value="' + column + '">' + column + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
             }); 
            $.ajax({
                url: '/get-table-columns',
                type: 'GET',
                data: {
                    tableName: "tbl_Customer",
                },
                success: function (response) {
                    console.log(response);
                    response.Result.forEach(function (column) {
                        $('#tbl_Customer').append('<option value="' + column + '">' + column + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
             }); 
            $.ajax({
                url: '/get-table-columns',
                type: 'GET',
                data: {
                    tableName: "MobileDeviceDetails",
                },
                success: function (response) {
                    console.log(response);
                    response.Result.forEach(function (column) {
                        $('#MobileDeviceDetails').append('<option value="' + column + '">' + column + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
             }); 
            $.ajax({
                url: '/get-table-columns',
                type: 'GET',
                data: {
                    tableName: "Assginpolicy",
                },
                success: function (response) {
                    console.log(response);
                    response.Result.forEach(function (column) {
                        $('#Assginpolicy').append('<option value="' + column + '">' + column + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
             }); 
            $.ajax({
                url: '/get-table-columns',
                type: 'GET',
                data: {
                    tableName: "TBl_ProductMaster",
                },
                success: function (response) {
                    console.log(response);
                    response.Result.forEach(function (column) {
                        $('#TBl_ProductMaster').append('<option value="' + column + '">' + column + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
             }); 
});

    </script>
@endsection
