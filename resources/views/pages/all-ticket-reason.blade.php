@extends('layouts.main') 
@section('title', 'All Ticket Reasons List')
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
                            <h4><b>{{ __('All Ticket Reasons List')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <button class="btn btn-secondary">
                                    <a href="create-ticket-reason" class="text-white">{{ __('Create Ticket Reason')}}</a>
                                </button>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header"><h3>{{ __('Data Table')}}</h3></div> --}}
                    <div class="card-body">
                        <table id="data_table" class="table text-center">
                            <thead>
                                <tr>
                                    <th><b>{{ __('TicketId')}}</b></th>
                                    <th><b>{{ __('Reason Title')}}</b></th>
                                    <th><b>{{ __('Created on')}}</b></th>
                                    <th class="nosort"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getticketreason['Result'] as $getticketreason)
                                <tr>
                                    <td>{{ $getticketreason['ID'] }}</td>
                                    <td>{{ $getticketreason['TicketReason'] }}</td>
                                    <td>{{ $getticketreason['CreatedOn'] }}</td>
                                    <td>
                                        <div class="table-actions text-center">
                                            <a href="#"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="#"><i class="ik ik-edit text-dark"></i></a>
                                            <a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a>
                                        </div>
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


    <script>
        $(document).ready(function() {
        $(".deleteButton").on("click", function() {
            var row = $(this).closest('tr');
            var userId = row.find('td:eq(0)').text();

            if (confirm("Are you sure you want to delete the employee with User ID " + userId + "?")) {
        
            var requestData = {
                "userID": userId,
                "id": userId,
                "statusId": 0
            };
        
            // Make an AJAX call to the API
            $.ajax({
                url: '/delete-ticket-reason/'+userId+'/', // Fix the URL to use companyId
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    // Handle success response
                    console.log('Employee deleted successfully:', response);
                    // Remove the row from the table
                    row.remove();
                },
                error: function(error) {
                    // Handle error response
                    console.error('Error deleting employee:', error);
                }
            });
            } else {
            // User clicked Cancel, do nothing
            console.log('Deletion canceled by user');
            }
        });
        });
        </script>

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