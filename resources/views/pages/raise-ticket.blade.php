@extends('layouts.main')
@section('title', 'Edit AMA Customer')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h5>{{ __('Raise Ticket') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('superadmin-dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-ticket') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="MobileNo">{{ __('Retailer Code / Mobile') }}<span
                                            class="text-red">*</span></label>
                                    <input type="text" id="MobileNo" name="MobileNo" class="form-control"
                                        placeholder="Enter Retailer Code / Mobile" autocomplete="off">
                                </div>

                                <div class="card-header">
                                    <button type="button" class="btn btn-secondary"
                                        id="ajaxButton">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-ticket') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="cmobile">{{ __('Customer Mobile') }}<span class="text-red">*</span></label>
                                    <input type="text" name="cmobile" id="cmobile" class="form-control"
                                        placeholder="Mobile">
                                        <input type="text" name="rid" id="rid" class="form-control">
                                    </div>

                                <div class="card-header">
                                    <button type="button" class="btn btn-secondary"
                                        id="ajaxCustomerButton">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-ticket') }}">
                            @csrf
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="ticketReason"><b>{{ __('ticketReason')}}</b><span class="text-red">*</span></label>
                                <select name="ticketReason" id="ticketReason" class="form-control">
                                
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="mobileNo">{{ __('mobileNo') }}<span class="text-red">*</span></label>
                                <input name="mobileNo" id="mobileNo" class="form-control" placeholder="Type Mobile No"></input>
                            </div>

                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="comment">{{ __('Comment') }}<span class="text-red">*</span></label>
                                <textarea name="comment" id="comment" class="form-control" placeholder="Type reason here"></textarea>
                            </div>

                            <div class="card-header">
                                <button type="submit" class="btn btn-secondary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6" id="retailer_details" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-6 mt-2">
                                <label for="RetailerCode">{{ __('RetailerCode : ') }}</label>
                                <span id="RetailerCode"></span>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-2">
                                <label for="Shop_Name">{{ __('Shop_Name : ') }}</label>
                                <span id="Shop_Name"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="ContactPer_Name">{{ __('ContactPer_Name : ') }}</label>
                                <span id="ContactPer_Name"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="Address">{{ __('Address : ') }}</label>
                                <span id="Address"></span>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-2">
                                <label for="Email">{{ __('Email : ') }}</label>
                                <span id="Email"></span>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-2">
                                <label for="mobile">{{ __('mobile : ') }}</label>
                                <span id="mobile"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="EnterpriseStatus">{{ __('EnterpriseStatus :') }}</label>
                                <span id="EnterpriseStatus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-md-4" id="retailer_details">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="USerID">{{ __('USerID : ') }}</label>
                                <span id="USerID"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="RetailerCode">{{ __('RetailerCode : ') }}</label>
                                <span id="RetailerCode"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="RetailerCode">{{ __('RetailerCode : ') }}</label>
                                <span id="RetailerCode"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="Shop_Name">{{ __('Shop_Name : ') }}</label>
                                <span id="Shop_Name"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="ContactPer_Name">{{ __('ContactPer_Name : ') }}</label>
                                <span id="ContactPer_Name"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="Address">{{ __('Address : ') }}</label>
                                <span id="Address"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="Email">{{ __('Email : ') }}</label>
                                <span id="Email"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="mobile">{{ __('mobile : ') }}</label>
                                <span id="mobile"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="EnterpriseStatus">{{ __('EnterpriseStatus :') }}</label>
                                <span id="EnterpriseStatus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="retailer_details">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="customerName">{{ __('Customer Name : ') }}</label>
                                <span id="customerName"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="customerAddress">{{ __('Address : ') }}</label>
                                <span id="customerAddress"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('Mobile : ') }}</label>
                                <span id="customerMobile"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="customerEmail">{{ __('E-mail : ') }}</label>
                                <span id="customerEmail"></span>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('IMEI : ') }}</label>
                                <span id="customerImei"></span>

                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('Brand : ') }}</label>
                                <span id="customerBrand"></span>

                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('Model : ') }}</label>
                                <span id="customerModel"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" style="display: none" id="enquiry_card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-ticket') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="MobileNo">{{ __('Select Enquery Type') }}<span
                                            class="text-red">*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">select</option>
                                        <option value="Retailer_Enquiry">Retailer Enquiry</option>
                                        <option value="Customer_Enquiry">Customer Enquiry</option>
                                    </select>
                                </div>

                                <div class="card-header">
                                    {{-- <button type="button" class="btn btn-secondary"
                                        id="ajaxButton">{{ __('Submit') }}</button> --}}
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#demoModal" id="openbtn">{{ __('Open')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-ticket') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="MobileNo">{{ __('Retailer Mobile No') }}<span
                                            class="text-red">*</span></label>
                                    <input type="text" id="MobileNo" name="MobileNo" class="form-control"
                                        placeholder="Enter Mobile Number" autocomplete="off">
                                </div>

                                <div class="card-header">
                                    <button type="button" class="btn btn-secondary"
                                        id="ajaxButton">{{ __('Submit') }}</button>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="cmobile">{{ __('Customer Mobile') }}<span class="text-red">*</span></label>
                                    <input type="text" name="cmobile" id="cmobile" class="form-control"
                                        placeholder="Mobile">
                                </div>

                                <div class="card-header">
                                    <button type="button" class="btn btn-secondary"
                                        id="ajaxCustomerButton">{{ __('Submit') }}</button>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="ticketReason"><b>{{ __('ticketReason')}}</b><span class="text-red">*</span></label>
                                    <select name="ticketReason" id="ticketReason" class="form-control">
                                    
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="mobileNo">{{ __('mobileNo') }}<span class="text-red">*</span></label>
                                    <input name="mobileNo" id="mobileNo" class="form-control" placeholder="Type Mobile No"></input>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="comment">{{ __('Comment') }}<span class="text-red">*</span></label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Type reason here"></textarea>
                                </div>

                                <div class="card-header">
                                    <button type="submit" class="btn btn-secondary">{{ __('Submit') }}</button>
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            {{-- $('#RetailerCode').text(data.Result[0].RetailerCode);
            $('#Shop_Name').text(data.Result[0].Shop_Name);
            $('#ContactPer_Name').text(data.Result[0].ContactPer_Name);
            $('#Address').text(data.Result[0].Address);
            $('#Email').text(data.Result[0].Email);
            $('#mobile').text(data.Result[0].MobileNo);
            $('#EnterpriseStatus').text(data.Result[0].EnterpriseStatus); --}}

                {{-- <div class="card">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="customerName">{{ __('Customer Name') }}<span class="text-red">*</span></label>
                                <p id="customerName"></p>
                                <label for="customerAddress">{{ __('Address') }}<span class="text-red">*</span></label>
                                <p id="customerAddress"></p>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-2">
                                <label for="retailer_id">{{ __('Mobile') }}<span class="text-red">*</span></label>
                                <p id="customerMobile"></p>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-2">
                                <label for="customerEmail">{{ __('E-mail') }}<span class="text-red">*</span></label>
                                <p id="customerEmail"></p>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('IMEI') }}<span class="text-red">*</span></label>
                                <p id="customerImei"></p>

                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('Brand') }}<span class="text-red">*</span></label>
                                <p id="customerBrand"></p>

                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="retailer_id">{{ __('Model') }}<span class="text-red">*</span></label>
                                <p id="customerModel"></p>

                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- </div> --}}
         
    </div>

    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">{{ __('Raise Ticket')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('create-ticket') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="ticketReason"><b>{{ __('ticketReason')}}</b></label>
                                <select name="ticketReason" id="ticketReason" class="form-control">
                                
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="mobileNo">{{ __('mobileNo') }}</label>
                                <input name="mobileNo" id="MobileNo" class="form-control" placeholder="Type Mobile No"></input>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="comment">{{ __('Comment') }}</label>
                                <textarea name="comment" id="comment" class="form-control" placeholder="Type reason here"></textarea>
                            </div>
                            <div class="card-header">
                                <button type="submit" class="btn btn-secondary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
                    <button type="button" class="btn btn-primary">{{ __('Save changes')}}</button>
                </div> --}}
            </div>
        </div>
    </div>

    <script>

        $.ajax({
                url: '/get-ticket-reason',
                type: 'GET',
                success: function (response) {
                    $('#ticketReason').empty();
                    console.log(response);
                    response.data.forEach(function (item) {
                        $('#ticketReason').append('<option value="' + item.ID + '">' + item.TicketReason + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
        }); 

        $(document).ready(function() {
            function fetchData(searchValue) {
                $.ajax({
                    url: '/auto-search-retailer',
                    type: 'POST',
                    data: {
                        searchValue: searchValue,
                        userID: 0
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data.Result[0]);
                        $('#rid').val(data.Result[0].USerID);
                        $('#USerID').text(data.Result[0].USerID);
                        $('#RetailerCode').text(data.Result[0].RetailerCode);
                        $('#Shop_Name').text(data.Result[0].Shop_Name);
                        $('#ContactPer_Name').text(data.Result[0].ContactPer_Name);
                        $('#Address').text(data.Result[0].Address);
                        $('#Email').text(data.Result[0].Email);
                        $('#mobile').text(data.Result[0].MobileNo);
                        $('#EnterpriseStatus').text(data.Result[0].EnterpriseStatus);
                        $('#retailer_details').show();
                        $('#enquiry_card').show();
                    },
                    error: function() {
                        console.log('Error in AJAX request');
                    }
                });
            }
            $('#ajaxButton').on('click', function() {
                var searchValue = $('#MobileNo').val();
                fetchData(searchValue);
            });
            $('#openbtn').on('click', function() {
                var mobileno = $('#MobileNo').val();

                $('#MobileNo').val(mobileno);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function fetchData(searchValue1,searchValue2) {
                $.ajax({
                    url: '/auto-search-customer',
                    type: 'POST',
                    data: {
                        searchValue1: searchValue1,
                        searchValue2: searchValue2,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data.Result[0]);
                        $('#customerName').text(data.Result[0].Cust_Name);
                        $('#customerMobile').text(data.Result[0].Cust_MobileNo);
                        $('#customerEmail').text(data.Result[0].Cust_Email);
                        $('#customerImei').text(data.Result[0].IMENumber);
                        $('#customerBrand').text(data.Result[0].Brand);
                        $('#customerModel').text(data.Result[0].Model);
                    },
                    error: function() {
                        console.log('Error in AJAX request');
                    }
                });
            }
            $('#ajaxCustomerButton').on('click', function() {
                var searchValue1 = $('#cmobile').val();
                var searchValue2  = $('#rid').val();
                fetchData(searchValue1,searchValue2);
            });
        });
    </script>  

@endsection