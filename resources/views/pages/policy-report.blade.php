@extends('layouts.main') 
@section('title', 'Manage Policy Report')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Manage Policy Report')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home text-dark"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item">
                                <a href="add-superstokist">{{ __('Add Super Stokist')}}</a>
                            </li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <label for="">{{ __('From Date')}}</label>
                    <input type="date" name="" id="" class="form-control" style="font-size:15px;border-radius:10px;">
                </div>
                <div class="col-lg-4">
                    <label for="">{{ __('To Date')}}</label>
                    <input type="date" name="" id="" class="form-control" style="font-size:15px;border-radius:10px;">
                </div>
                <div class="col-sm-4">
                    <label for="roleName"><b>{{ __('Select Type')}}</b></label>
                    {{-- <input type="text" name="roleName" class="form-control" placeholder="Enter Role"/> --}}
                    <select name="reporting_to" id="reporting_to" class="form-control">
                        @foreach ($roleDetails['Result'] as $role)
                            <option value="{{ $role['RoleID'] }}">{{ $role['RoleName'] }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- @if(session('roleName')==1)
                    <div class="col-lg-3">
                        <label for="">{{ __('Select Company')}}<span class="text-red">*</span></label>
                        <select name="" class="form-control select2" style="font-size:15px;border-radius:10px;"
                            id="companyId"></select>
                    </div>
               @endif --}}
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                    {{-- <div class="card-header"><h3>{{ __('Data Table')}}</h3></div> --}}
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-hover">
                            <thead class="bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('Details 1')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details 2')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details 3')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($policyreport['Result'] as $policyreport)
                                <tr>
                                    <td>
                                        <p><b>PakageID : </b>{{ $policyreport['PakageID'] }}</p>
                                        <p><b>UserName : </b>{{ $policyreport['UserName'] }}</p>
                                        <p><b>PakageName : </b>{{ $policyreport['PakageName'] }}</p>
                                        <p><b>SmartPolicy : </b>{{ $policyreport['SmartPolicy'] }}</p>
                                    </td>
                                    <td>    
                                        <p><b>RegPolicy : </b>{{ $policyreport['RegPolicy'] }}</p>
                                        <p><b>UserName : </b>{{ $policyreport['UserID'] }}</p>
                                        <p><b>PhoneNumber : </b>{{ $policyreport['PhoneNumber'] }}</p>
                                        <p><b>NumberofKey : </b>{{ $policyreport['NumberofKey'] }}</p>
                                    </td>
                                    <td>
                                        <p><b>balKey : </b>{{ $policyreport['balKey'] }}</p>
                                        <p><b>UtilizeKey : </b>{{ $policyreport['UtilizeKey'] }}</p>
                                        <p><b>SeniorName : </b>{{ $policyreport['SeniorName'] }}</p>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    	<!-- push external js -->
        @push('script')
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
       
        
        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>
    
    <!-- push external js -->
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection