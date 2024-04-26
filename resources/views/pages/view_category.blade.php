@extends('layouts.main') 
@section('title', 'Manage Brands')
@section('content')
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h3><b>{{ __('Manage Product Template')}}</b></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="amount"><b>{{ __('Enter the Amount')}}</b></label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount" autocomplete="off">
                                </div>
                            </div>
                            <div class="card-header">
                                <button type="button" class="btn btn-secondary" id="ajaxButton"><b>{{ __('SUBMIT')}}</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-hover text-center">
                            <thead class="text-center bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('Customer ID')}}</b></th>
                                    <th class="text-white"><b>{{ __('Name')}}</b></th>
                                    <th class="text-white"><b>{{ __('Email')}}</b></th>
                                    <th class="text-white"><b>{{ __('Mobile')}}</b></th>
                                    <th class="text-white"><b>{{ __('Brand')}}</b></th>
                                    <th class="text-white"><b>{{ __('Amount')}}</b></th>
                                    <th class="text-white"><b>{{ __('IMEI No')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
    
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
            var companyId = row.find('td:eq(1)').text();
            var statusId = row.find('td:eq(2)').text();
            console.log(userId);
            console.log(companyId);
            if (confirm("Are you sure you want to delete the distributor with User ID " + userId + "?")) {
        
            var requestData = {
                "userID": userId,
                "id": companyId,
                "statusId": statusId
            };
        
            $.ajax({
                url: '/delete-distributor/'+userId+'/'+userId, 
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    console.log('Distributor deleted successfully:', response);
                    row.remove();
                },
                error: function(error) {
                    console.error('Error deleting company:', error);
                }
            });
            } else {
            console.log('Deletion canceled by user');
            }
        });
        });
        </script>
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
    
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/get-superstockist.js') }}"></script>
    <script src="{{ asset('js/get-company.js') }}"></script>

    <script>
        $(document).ready(function() {

        $('#ajaxButton').on('click', function() {
            var amount = $('#amount').val();
            fetchData(amount);
        });

        function fetchData(amount) {
            $.ajax({
                url: '/manage-view-category-details',
                type: 'POST',
                data: {
                    amount: amount
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var tbody = $('#data_table tbody');
                    tbody.empty(); // Clear previous data
                    data.Result.forEach(function(item) {
                        var row = $('<tr>');
                        row.append($('<td>').text(item.CustID));
                        row.append($('<td>').text(item.Cust_Name));
                        row.append($('<td>').text(item.Cust_Email));
                        row.append($('<td>').text(item.Cust_MobileNo));
                        row.append($('<td>').text(item.Brand));
                        row.append($('<td>').text(item.DeviceAmt));
                        row.append($('<td>').text(item.IMENumber));
                        // Append the table actions cell
                        var tableActionsCell = $('<td>'); // Create a table cell
                        var tableActionsDiv = $('<div>').addClass('table-actions'); // Create a div for table actions
                        tableActionsDiv.css({
                            display: 'flex',
                            justifyContent: 'center',
                            alignItems: 'center'
                        }); // Center the content vertically and horizontally
                        tableActionsDiv.append('<a data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye text-dark"></i></a>'); // Append eye icon
                        // tableActionsDiv.append('<a href="#"><i class="ik ik-edit-2 text-dark"></i></a>'); // Append edit icon
                        // tableActionsDiv.append('<a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a>'); // Append trash icon
                        tableActionsCell.append(tableActionsDiv); // Append table actions div to the table cell
                        row.append(tableActionsCell); // Append table actions cell to the table row
                        tbody.append(row);
                    });
                },
                error: function() {
                    console.log('Error in AJAX request');
                }
            });
        }
        });
    </script>
    @endpush
@endsection