@extends('layouts.main')
@section('title', 'View Company Retailer')
@section('content')
<!-- push external head elements to head -->
@push('head')

{{--
<link rel="stylesheet" href="{{ 
        asset('plugins/weather-icons/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}"> --}}
@endpush

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-primary"></i>
                    <div class="d-inline">
                        <h5><b>{{ __('Company Retailers')}}</b></h5>
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

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <button class="form-control" style="font-size:15px;border-radius:10px;">All</button>
                </div>                            
                <div class="col-lg-4">
                    <button class="form-control" style="font-size:15px;border-radius:10px;">Assigned</button>
                </div>                            
                <div class="col-lg-4">
                    <button class="form-control" style="font-size:15px;border-radius:10px;">Not Assigned</button>
                </div>                            
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3>{{ __('Data Table')}}</h3>
                </div> --}}
                <div class="card-body">
                    <table id="data_table" class="table table-striped table-hover">
                        <thead class="text-center bg-primary">
                            <tr>
                                <th class="text-white"><b>{{ __('RetailerCode')}}</b></th>
                                <th class="text-white"><b>{{ __('Shop_Name')}}</b></th>
                                <th class="text-white"><b>{{ __('ContactPer_Name')}}</b></th>
                                <th class="text-white"><b>{{ __('Address')}}</b></th>
                                <th class="text-white"><b>{{ __('Email')}}</b></th>
                                <th class="text-white"><b>{{ __('MobileNo')}}</b></th>
                                <th class="text-white"><b>{{ __('Status')}}</b></th>
                                <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewcompanyretailer as $viewcompanyretailer)
                            <tr>
                                <td class="text-center"><b>{{ $viewcompanyretailer['RetailerCode'] }}</b></td>
                                <td class="text-center">{{ $viewcompanyretailer['Shop_Name'] }}</td>
                                <td class="text-center">{{ $viewcompanyretailer['ContactPer_Name'] }}</td>
                                <td class="text-center">{{ $viewcompanyretailer['Address'] }}</td>
                                <td class="text-center">{{ $viewcompanyretailer['Email'] }}</td>
                                <td class="text-center">{{ $viewcompanyretailer['MobileNo'] }}</td>
                                <td class="text-center">
                                    @if($viewcompanyretailer['EnterpriseStatus'] == 'Enterprise ID Present')
                                        <span class="badge badge-success">Assigned</span>
                                    @else
                                        <span class="badge badge-danger">Not Assigned</span>
                                    @endif
                                </td>
                                    <td class="text-center">
                                    <div class="table-actions text-center">
                                        {{-- <a href="upload-files/{{ $viewcompanyretailer['USerID'] }}"><i class="ik ik-eye text-dark"></i></a> --}}
                                        <a href="{{ url('/upload-files/' . $viewcompanyretailer['USerID']) }}"><i class="ik ik-eye text-dark"></i></a>
                                        {{-- <a href="#"><i class="ik ik-edit text-dark"></i></a> --}}
                                        {{-- <a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a> --}}
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

{{-- <script>
    $(document).ready(function() {
        $(".deleteButton").on("click", function() {
            var row = $(this).closest('tr');
            var userId = row.find('td:eq(0)').text();
            var companyId = row.find('td:eq(1)').text();
            var statusId = row.find('td:eq(2)').text();
            console.log(userId);
            console.log(companyId);
            if (confirm("Are you sure you want to delete the super stokist with User ID " + userId + "?")) {
        
            var requestData = {
                "userID": userId,
                "id": companyId,
                "statusId": statusId
            };
        
            $.ajax({
                url: '/delete-superstokist/'+userId+'/'+userId, 
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    console.log('SuperStokist deleted successfully:', response);
                    row.remove();
                },
                error: function(error) {
                    console.error('Error deleting distributor:', error);
                }
            });
            } else {
            console.log('Deletion canceled by user');
            }
        });
        });
</script> --}}

<!-- push external js -->
@push('script')



<!-- push external js -->
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

<script src="{{ asset('js/get-company.js') }}"></script>
@endpush
@endsection