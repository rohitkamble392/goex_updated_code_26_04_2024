@extends('layouts.main') 
@section('title', 'All Retailers')
@section('content')
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
                            <h4><b>{{ __('ALL RETAILERS')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home text-dark"></i></a>
                            </li>
                        </li>
                        {{-- <li class="breadcrumb-item">
                            <a href="add-retailer">{{ __('Add Retailer')}}</a>
                        </li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-hover">
                            <thead class="bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('ID')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details')}}</b></th>
                                    <th class="text-white"><b>{{ __('Address')}}</b></th>
                                    <th class="text-white"><b>{{ __('Document')}}</b></th>
                                    <th class="text-white nosort"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($retailerDetails['Result'] as $retailer)
                                <tr>
                                    <td class="text-center">
                                        <p><b>Retailer ID : </b>{{ $retailer['ID'] }}</p>
                                        <p><b>User ID : </b>{{ $retailer['USerID'] }}</p>
                                    </td>
                                    <td>
                                        <p><b>Shop Name : </b>{{ $retailer['Shop_Name'] }}</p>
                                        <p><b>Contact Person Name : </b>{{ $retailer['ContactPer_Name'] }}</p>
                                        <p><b>Mobile : </b>{{ $retailer['MobileNo'] }}</p>
                                        <p><b>Email : </b>{{ $retailer['Email'] }}</p>
                                    </td>
                                    <td>
                                        <p><b>Address : </b>{{ $retailer['Address'] }}</p>
                                        <p><b>PinCode : </b>{{ $retailer['Pincode'] }}</p>
                                        <p><b>State : </b>{{ $retailer['State_id'] }}</p>
                                        <p><b>District : </b>{{ $retailer['District'] }}</p>
                                    </td>
                                    <td>
                                        <p><b>GST No : </b>{{ $retailer['GST_No'] }}</p>
                                        <p><b>PAN No : </b>{{ $retailer['PAN_No'] }}</p>
                                        <p><b>Aadhar No : </b>{{ $retailer['Aadhar_No'] }}</p>
                                        <p><b>ZeroTouch : </b>{{ $retailer['Is_Zero'] }}</p>
                                    </td>
                                    <td>
                                        <div class="table-actions text-center">
                                            <a href="upload-retailer-data/{{ $retailer['USerID'] }}"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="edit-retailer/{{ $retailer['MobileNo'] }}"><i class="ik ik-edit-2 text-dark"></i></a>
                                            <a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody> --}}
                            
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
            if (confirm("Are you sure you want to delete the retailer with User ID " + userId + "?")) {
        
            var requestData = {
                "userID": userId,
                "id": companyId,
                "statusId": statusId
            };
        
            $.ajax({
                url: '/delete-retailer/'+userId+'/'+userId, 
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    console.log('Retailer deleted successfully:', response);
                    row.remove();
                },
                error: function(error) {
                    console.error('Error deleting retailer:', error);
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
    @endpush
@endsection 

