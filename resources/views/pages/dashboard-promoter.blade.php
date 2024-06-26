@extends('layouts.main') 
@section('title', 'Retailer Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">
    		<!-- page statustic chart start -->
            <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="manage-customer" class="text-white">
                                    <h4 class="mb-0">{{ __('2,563')}}</h4>
                                    <p class="mb-0">{{ __('All Customers')}}</p>
                                </a>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="add-customer" class="text-white">
                                    <h4 class="mb-0">{{ __('2,563')}}</h4>
                                    <p class="mb-0">{{ __('Add Customer')}}</p>
                                </a>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="policy-details" class="text-white">
                                    <h4 class="mb-0">{{ __('2,563')}}</h4>
                                    <p class="mb-0">{{ __('Policies')}}</p>
                                </a>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- page statustic chart end -->  
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