@extends('layouts.main')

@section('title', 'Seft Balance Key')

@section('content')
    @push('head')
        <!-- Include stylesheets -->
        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Manage Key Report')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Search or additional buttons can go here -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-primary"><b>SMART POLICY</b></h4>
                                <h6 class="fw-700 text-primary">1,563</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye bg-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-primary"><b>REGULAR POLICY</b></h4>
                                <h6 class="fw-700 text-primary">1,253</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye bg-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Display success or error messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-Primary">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card-body ">
                      
                            <table id="data_table" class="table table-striped table-bordered p-2">
                                <thead class="bg-primary">
                                    <tr>
                                        <th style="color: white">Pakage Details</th>
                                        <th style="color: white">Key Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viewPolicyDetails['Result'] as $viewpolicy)
                                    
                                    <tr>
                                        <td>
                                            <strong>User Name : </strong> {{ $viewpolicy['UserName'] }}<br>
                                            <strong>Package Name : </strong> {{ $viewpolicy['PakageName'] }}<br>
                                            @if ($viewpolicy['SmartPolicy'] == 1)
                                                <strong>Policy Type : </strong> <span class="bg-success text-white px-2 rounded">Smart Policy</span><br>
                                            @elseif ($viewpolicy['RegPolicy'] == 1)
                                                <strong>Policy Type : </strong> <span class="bg-Primary text-white px-2 rounded">Regular Policy</span><br>
                                            @endif
                                            <strong>Phone Number : </strong> {{ $viewpolicy['PhoneNumber'] }}
                                        </td>                                       
                                        <td>
                                            <strong>Number of Key : </strong> {{ $viewpolicy['NumberofKey'] }}<br>
                                            <strong>Balance Keys : </strong> {{ $viewpolicy['balKey'] }}<br>
                                            <strong>Used Keys : </strong> {{ $viewpolicy['UtilizeKey'] }}<br>
                                            <strong>Assigned By : </strong> {{ $viewpolicy['SeniorName'] }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <!-- Include scripts -->
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
