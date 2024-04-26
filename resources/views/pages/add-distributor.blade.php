@extends('layouts.main')
@section('title', 'Add Distributor')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-primary"></i>
                    <div class="d-inline">
                        <h5><b>{{ __('ADD DISTRIBUTOR')}}</b></h5>
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

        @include('include.message')
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3>{{ __('Add Distributor')}}</h3>
                </div> --}}
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('create-distributor') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="name">{{ __('Name')}}</label>
                                <input type="text" name="name" class="form-control" placeholder="Distributor Name">
                            </div>
                            <div class="col-sm-4">
                                <label for="mobileNo">{{ __('Mobile Number')}}</label>
                                <input type="text" name="mobileNo" class="form-control" placeholder="Mobile No">
                            </div>
                            <div class="col-sm-4">
                                <label for="email">{{ __('Email')}}</label>
                                <input type="email" name="email" class="form-control" placeholder="Distributor Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="password">{{ __('Enter Password')}}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter password" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-sm-4">
                                <label for="address">{{ __('Address')}}</label>
                                <textarea type="text" name="address" class="form-control"
                                    placeholder="Enter Address"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <label for="pincode">{{ __('PIN Code')}}</label>
                                <input type="number" name="pincode" class="form-control" placeholder="Enter PIN Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="state">{{ __('State')}}</label>
                                <select name="state" id="state" class="form-control select2">
                                    <option value="1">Andhra Pradesh</option>
                                    <option value="2">Arunachal Pradesh</option>
                                    <option value="3">Assam</option>
                                    <option value="4">Bihar</option>
                                    <option value="5">Chhattisgarh</option>
                                    <option value="6">Goa</option>
                                    <option value="7">Gujarat</option>
                                    <option value="8">Haryana</option>
                                    <option value="9">Himachal Pradesh</option>
                                    <option value="10">Jharkhand</option>
                                    <option value="11">Karnataka</option>
                                    <option value="12">Kerala</option>
                                    <option value="13">Madhya Pradesh</option>
                                    <option value="14">Maharashtra</option>
                                    <option value="15">Manipur</option>
                                    <option value="16">Meghalaya</option>
                                    <option value="17">Mizoram</option>
                                    <option value="18">Nagaland</option>
                                    <option value="19">Odisha</option>
                                    <option value="20">Punjab</option>
                                    <option value="21">Rajasthan</option>
                                    <option value="22">Sikkim</option>
                                    <option value="23">Tamil Nadu</option>
                                    <option value="24">Telangana</option>
                                    <option value="25">Tripura</option>
                                    <option value="26">Uttar Pradesh</option>
                                    <option value="27">Uttarakhand</option>
                                    <option value="28">West Bengal</option>
                                    <option value="29">Andaman and Nicobar Islands</option>
                                    <option value="30">Chandigarh</option>
                                    <option value="31">Dadra and Nagar Haveli and Daman and Diu</option>
                                    <option value="32">Delhi</option>
                                    <option value="33">Ladakh</option>
                                    <option value="34">Lakshadweep</option>
                                    <option value="35">Puducherry</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="district">{{ __('District')}}</label>
                                <input type="text" name="district" class="form-control" placeholder="Enter District">
                            </div>
                            <div class="col-sm-4">
                                <label for="roleName"><b>{{ __('Select Role')}}</b></label>
                                <select name="reporting_to" id="reporting_to" class="form-control">
                                    @foreach ($roleDetails['Result'] as $role)
                                        <option value="{{ $role['RoleID'] }}">{{ $role['RoleName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-header"><button type="submit" class="btn btn-primary"><b>{{
                                    __('SUBMIT')}}</b></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/get-superstockist.js') }}"></script>
@endpush
@endsection