@extends('layouts.main') 
@section('title', 'Super Admin Dashboard')
@section('content')
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget bg-secondary">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <a href="all-ticket-reasons" class="text-light">
                                    <h5><b>{{ __('Ticket Reasons')}}</b></h5>
                                    <h2 id="countDisplay1">0</h2>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget bg-secondary">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <a href="all-task-list" class="text-light">
                                    <h5><b>{{ __('Task List')}}</b></h5>
                                    <h2 id="countDisplay2">0</h2>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget bg-secondary">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <a href="all-tickets" class="text-light">
                                    <h5><b>{{ __('Ticket List')}}</b></h5>
                                    <h2 id="countDisplay3">0</h2>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/get-ticket-reason-count',
                type: 'GET',
                success: function(response) {
                    // Update HTML component with the count
                    $('#countDisplay1').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '/get-task-list-count',
                type: 'GET',
                success: function(response) {
                    // Update HTML component with the count
                    $('#countDisplay2').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '/get-ticket-count',
                type: 'GET',
                success: function(response) {
                    // Update HTML component with the count
                    $('#countDisplay3').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });


</script>
    @endpush
@endsection