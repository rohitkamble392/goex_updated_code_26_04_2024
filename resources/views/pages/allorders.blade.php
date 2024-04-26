@extends('layouts.main') 
@section('title', 'All Packages')
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
                            <h5><b>{{ __('All Packages')}}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home text-dark"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="add-package">{{ __('Add Package')}}</a>
                            </li>
                        </ol>
                    </nav>
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
                                    <th class="text-white"><b>{{ __('ID')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details')}}</b></th>
                                    <th class="text-white"><b>{{ __('Address')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails['Result'] as $order)
                                <tr>
                                    <td class="text-center"><b>{{ $order['ID'] }}</b></td>
                                    <td>
                                        <p><b>Zoho_ItemID : </b>{{ $order['Zoho_ItemID'] }}</p>
                                        <p><b>Title : </b>{{ $order['Title'] }}</p>
                                        <p><b>QTY : </b>{{ $order['QTY'] }}</p>
                                        <p><b>Amount : </b>{{ $order['Amount'] }}</p>
                                    </td>
                                    <td>
                                        <p><b>IS_Active : </b>{{ $order['IS_Active'] }}</p>
                                        <p><b>MOP : </b>{{ $order['MOP'] }}</p>
                                        <p><b>Description : </b>{{ $order['Description'] }}</p>
                                        <p><b>For_Policy : </b>{{ $order['For_Policy'] }}</p>
                                    </td>
                                    <td>
                                        <p><b>Valid_Till : </b>{{ $order['Valid_Till'] }}</p>
                                        {{-- <p><b>ImageURL : </b>{{ $order['ImageURL'] }}</p> --}}
                                        <p><b>Days_90_Price : </b>{{ $order['Days_90_Price'] }}</p>
                                        <p><b>Days_180_Price : </b>{{ $order['Days_180_Price'] }}</p>
                                        <p><b>Days_365_Price : </b>{{ $order['Days_365_Price'] }}</p>
                                        <p><b>Policy_type : </b>{{ $order['Policy_type'] }}</p>
                                    </td>
                                    <td>
                                        <div class="table-actions text-center">
                                            <a data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye text-dark"></i></a>
                                            {{-- <a href="#"><i class="ik ik-edit-2 text-dark"></i></a> --}}
                                            <a href="#"><i class="ik ik-edit-2 text-dark"></i></a>
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
            var id = row.find('td:eq(0)').text();
            console.log(id);
            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete the Package with ID " + id + "?")) {
            // User clicked OK, proceed with the deletion
        
            var requestData = {
                "id": id,
            };
        
            // Make an AJAX call to the API
            $.ajax({
                url: '/delete-package/'+id, // Fix the URL to use companyId
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    // Handle success response
                    console.log('Package deleted successfully:', response);
                    // Remove the row from the table
                    row.remove();
                },
                error: function(error) {
                    // Handle error response
                    console.error('Error deleting package:', error);
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