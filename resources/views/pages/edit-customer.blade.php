@extends('layouts.main') 
@section('title', 'Edit Customer')
@section('content')


<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h5>{{ __('Edit Customer')}}</h5>
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
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header"><h3>{{ __('Add Retailer')}}</h3></div> --}}
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('update-customer') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="cust_Name">{{ __('Customer Name')}}<span class="text-red">*</span></label>
                                    <input type="text" name="cust_Name" class="form-control"  value="{{ $customer['Cust_Name'] }}">
                                    <input type="text" name="ID" id="ID" class="form-control" value="{{ $customer['CustID'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="cust_Email">{{ __('Email')}}<span class="text-red">*</span></label>
                                    <input type="email" name="cust_Email" class="form-control" value="{{ $customer['Cust_Email'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="cust_MobileNo">{{ __('Mobile Number')}}<span class="text-red">*</span></label>
                                    <input type="number" name="cust_MobileNo" class="form-control" value="{{ $customer['Cust_MobileNo'] }}">
                                </div>
                            </div>
                        <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="imeNumber">{{ __('IMEI 1')}}<span class="text-red">*</span></label>
                                    <input type="number" name="imeNumber" class="form-control" value="{{ $customer['IMENumber'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="imeNumber1">{{ __('IMEI 2')}}<span class="text-red">*</span></label>
                                    <input type="number" name="imeNumber1" class="form-control" value="{{ $customer['IMENumber1'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="serial_No">{{ __('Serial Number')}}<span class="text-red">*</span></label>
                                    <input type="text" name="serial_No" class="form-control" value="{{ $customer['Serial_No'] }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="model">{{ __('Model')}}<span class="text-red">*</span></label>
                                    <input type="number" name="model" class="form-control" value="{{ $customer['Model'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="brand">{{ __('Brand')}}<span class="text-red">*</span></label>
                                    <input type="number" name="brand" class="form-control" value="{{ $customer['Brand'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="finaciar_id">{{ __('Financier Name')}}<span class="text-red">*</span></label>
                                    <select name="finaciar_id" id="" class="form-control" value="{{ $customer['Finaciar_id'] }}"> 
                                        <option value="">Select Finance Type</option>
                                        <option value="1">BAJAJ FINANCE</option>
                                        <option value="2">HOME CREDIT FINANCE</option>
                                        <option value="3">IDFC FINANCE</option>
                                        <option value="4">HDFC FINANCE</option>
                                        <option value="5">KOTAK FINANCE</option>
                                        <option value="6">PRIVATE FINANCE</option>
                                        <option value="7">OTHER FINANCE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="emI_Amount">{{ __('EMI Amount')}}<span class="text-red">*</span></label>
                                    <input type="number" name="emI_Amount" class="form-control" value="{{ $customer['EMI_Amount'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="deviceAmt">{{ __('Device Price')}}<span class="text-red">*</span></label>
                                    <input type="number" name="deviceAmt" class="form-control" value="{{ $customer['DeviceAmt'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="down_Payment">{{ __('Down Payment')}}<span class="text-red">*</span></label>
                                    <input type="number" name="down_Payment" class="form-control" value="{{ $customer['Down_Payment'] }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="emI_Tenure">{{ __('EMI Tenure')}}<span class="text-red">*</span></label>
                                    <input type="number" name="emI_Tenure" class="form-control" value="{{ $customer['EMI_Tenure'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="emI_Date">{{ __('EMI Date')}}<span class="text-red">*</span></label>
                                    <input type="date" name="emI_Date" class="form-control" value="{{ $customer['EMI_Date'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="remarks">{{ __('Additional Comment')}}<span class="text-red">*</span></label>
                                    <textarea type="number" name="remarks" class="form-control">{{ $customer['Remarks'] }}</textarea>
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary">{{ __('Submit')}}</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    {{-- <div class="card-header"><h3>{{ __('Add Retailer')}}</h3></div> --}}
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('update-customer') }}" >
                            @csrf
                                <div class="col-sm-12">
                                    <label for="">{{ __('Select Policy')}}<span class="text-red">*</span></label>
                                    <select name="" id="" class="form-control"> 
                                        <option value="1">Select Policy</option>
                                        <option value="2">Default</option>
                                        <option value="3">LockDevice</option>
                                        <option value="4">UnlockDevice</option>
                                        <option value="5">UnistallDevice</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-header d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-secondary">{{ __('Submit')}}</button>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid"></div>
@endsection
