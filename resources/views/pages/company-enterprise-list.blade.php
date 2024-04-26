@extends('layouts.main')
@section('title', 'Manage Company Enterprise')
@section('content')
@push('head')


<link rel="stylesheet" href="{{ 
        asset('plugins/weather-icons/css/weather-icons.min.css') }}">
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
                        <h5><b>{{ __('Manage Company Enterprise')}}</b></h5>
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

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-4">
                    <label for="companyID"><b>{{ __('companyID')}}</b></label>
                    <select name="companyID" id="companyID" class="form-control">
                    
                    </select>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row">
                <div class="col-lg-3">
                    <button type="button" class="btn btn-secondary" id="ajaxButton">{{ __('Search') }}</button>
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
                                <th class="text-white"><b>{{ __('CompanyID')}}</b></th>
                                <th class="text-white"><b>{{ __('EnterpriseID')}}</b></th>
                                <th class="text-white"><b>{{ __('RetailerID')}}</b></th>
                                <th class="text-white"><b>{{ __('ResellerID')}}</b></th>
                                <th class="text-white"><b>{{ __('ConfigID')}}</b></th>
                                <th class="text-white"><b>{{ __('ZCompanyID')}}</b></th>
                                <th class="text-white"><b>{{ __('Action')}}</b></th>
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

<!-- Modal Markup -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Customer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@push('script')

<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

<script>
    $(document).ready(function() {

        $('#ajaxButton').on('click', function() {
            var companyID = $('#companyID').val();
            fetchData(companyID);
        });
        
        function fetchData(companyID) {
            $.ajax({
                url: '/manage-company-enterprise-details',
                type: 'POST',
                data: {
                    companyID: companyID
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var tbody = $('#data_table tbody');
                    tbody.empty(); // Clear previous data
                    data.Result.forEach(function(item) {
                        var row = $('<tr>');
                        row.append($('<td>').text(item.CompanyID));
                        row.append($('<td>').text(item.EnterpriseID));
                        row.append($('<td>').text(item.RetailerID));
                        row.append($('<td>').text(item.ResellerID));
                        row.append($('<td>').text(item.ConfigID));
                        row.append($('<td>').text(item.ZCompanyID));
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
    
    $.ajax({
        url: '/get-company',
        type: 'GET',
        success: function (response) {
            $('#companyID').empty();
            console.log(response);
            response.data.forEach(function (item) {
                $('#companyID').append('<option value="' + item.User_id + '">' + item.Com_Name + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
</script>


@endpush
@endsection
