@extends('layouts.main') 
@section('title', 'Manage Brands')
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
                            <h4><b>{{ __('Manage Brands')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home text-dark"></i></a>
                            </li> --}}
                            {{-- <li class="breadcrumb-item">
                                <a href="add-distributor">{{ __('Add Product')}}</a>
                            </li> --}}
                            <li class="breadcrumb-item">
                                <button class="btn btn-secondary"><a href="add-brand" class="text-white">{{ __('Add Brand')}}</a></button>
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
                        <table id="simpletable" class="table table-striped table-hover">
                            <thead class="text-center bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('Brand_ID')}}</b></th>
                                    <th class="text-white"><b>{{ __('Brand_Name Name')}}</b></th>
                                    {{-- <th class="text-white"><b>{{ __('CategoryID')}}</b></th> --}}
                                    <th class="text-white"><b>{{ __('Created_Date')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brandsdetails['Result'] as $brand)
                                <tr>
                                    <td class="text-center">{{ $brand['Brand_ID'] }}</td>
                                    <td class="text-center">{{ $brand['Brand_Name'] }}</td>
                                    {{-- <td class="text-center">{{ $brand['CategoryID'] }}</td> --}}
                                    <td class="text-center">{{ $brand['Created_Date'] }}</td>
                                    <td class="text-center">
                                        <div class="table-actions text-center">
                                            <button class="bg-secondary" type="button" data-toggle="modal" data-target="#demoModal" data-id="{{ $brand['Brand_ID'] }}" data-name="{{ $brand['Brand_Name'] }}" data-name="{{ $brand['CategoryID'] }}"><i class="ik ik-edit-2 text-white"></i></button>
                                            <button href="#" class="deleteButton bg-secondary"><i class="ik ik-trash-2 text-white"></i></button>
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

    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">{{ __('Update Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('create-brand') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="brand_Name">{{ __('Brand Name')}}<span class="text-red">*</span></label>
                                <input type="text" name="brand_Name" class="form-control" placeholder="Enter Brand Name">
                            </div>
                        </div>

                        <input type="text" id="categoryValues" name="categoryValues">
                        <div class="form-group row">
                            <div class="col-sm-12 col-xl-6 mb-30">
                                <h4 class="sub-title"><b>{{ __('Select Category')}}</b></h4>
                                {{-- <div class="border-checkbox-section">
                                    @foreach($categories['Result'] as $category)
                                    <div class="border-checkbox-group border-checkbox-group-secondary" style="display: block;">
                                        <input class="border-checkbox category-checkbox" type="checkbox" id="checkbox{{$category['ID']}}" name="CategoryID[]" value="{{$category['ID']}}">
                                        <label class="border-checkbox-label" for="checkbox{{$category['ID']}}">{{$category['Category_Name']}}</label>
                                    </div>
                                    <br>
                                @endforeach
                                </div> --}}
                            </div>
                        </div>                   
                        <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{
                                    __('SUBMIT')}}</b></button></div>
                    </form>
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
            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete the distributor with User ID " + userId + "?")) {
            // User clicked OK, proceed with the deletion
        
            var requestData = {
                "userID": userId,
                "id": companyId,
                "statusId": statusId
            };
        
            // Make an AJAX call to the API
            $.ajax({
                url: '/delete-distributor/'+userId+'/'+userId, // Fix the URL to use companyId
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    // Handle success response
                    console.log('Distributor deleted successfully:', response);
                    // Remove the row from the table
                    row.remove();
                },
                error: function(error) {
                    // Handle error response
                    console.error('Error deleting company:', error);
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
    <script src="{{ asset('js/get-superstockist.js') }}"></script>
    <script src="{{ asset('js/get-company.js') }}"></script>

    <script>
        $(document).ready(function(){
            
            $('#superStockistId').change(function(){
                var superStockistId = $(this).val();
               
                // AJAX call
                $.ajax({
                    url: "{{ url('/get-distributor') }}/",
                    method: 'GET',
                    data: {
                        superStockistId: superStockistId
                },
                    success: function(response){
                        // Clear existing table rows
    
                        console.log(response);
                        $('#data_table tbody').empty();
                        // Populate table with fetched data
                        response.data.forEach(function(user){
                            $('#data_table tbody').append('<tr>' +
                                '<td>' + user.ID + '</td>' +
                                '<td>' + user.Name + '</td>' +
                                '<td>' + user.MobileNo + '</td>' +
                                '<td>' + user.Email + '</td>' +
                                '<td>' + user.Address + '</td>' +
                                '<td>' + 'Action Buttons here' + '</td>' +
                                '</tr>');
                        });
                    },
                    error: function(xhr, status, error){
                        // Handle errors
                        console.error(error);
                    }
                });
            });

            //second coede

            $('#companyId').change(function(){
                var companyId = $(this).val();
               
                // AJAX call
                $.ajax({
                    url: "{{ url('/get-superstockist') }}/",
                    method: 'GET',
                    data: {
                        companyId: companyId
                },
                    success: function(response){
                        $('#superStockistId').empty();
 
                            // Iterate over the data and append options
                            response.data.forEach(function(item) {
                                $('#superStockistId').append('<option value="' + item.ID + '">' + item.Name + '</option>');
                            });
                    },
                    error: function(xhr, status, error){
                        // Handle errors
                        console.error(error);
                    }
                });
            });
        });
    </script>

    @endpush
@endsection