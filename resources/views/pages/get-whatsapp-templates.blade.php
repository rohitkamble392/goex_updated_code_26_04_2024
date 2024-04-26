@extends('layouts.main') 
@section('title', 'Manage WhatsApp Template')
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
                            <h4><b>{{ __('Manage Whatsapp Template')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home text-dark"></i></a>
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
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-hover">
                            <thead class="bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('ID')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details 1')}}</b></th>
                                    <th class="text-white"><b>{{ __('Details 2')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($templateDetails['Result'] as $template)
                                <tr>
                                    <td class="text-center">{{ $template['ID'] }}</td> 
                                    <td>
                                        <P><b>TemplateName : </b>{{ $template['TemplateName'] }}</P>    
                                        <P><b>APIKey : </b>{{ $template['APIKey'] }}</P>    
                                        <P><b>SenderNumber : </b>{{ $template['SenderNumber'] }}</P>    
                                        <P><b>AppName : </b>{{ $template['AppName'] }}</P>    
                                    </td> 
                                    <td>
                                        <P><b>TemplateID : </b>{{ $template['TemplateID'] }}</P>    
                                        <P><b>ForUse : </b>{{ $template['ForUse'] }}</P>    
                                        <P><b>Role : </b>{{ $template['Role'] }}</P>    
                                        <P><b>Parameter : </b>{{ $template['Parameter'] }}</P>    
                                    </td> 
                                    <td>
                                        <div class="table-actions text-center">
                                            <a data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye text-dark"></i></a>
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

    {{-- <script>
        $(document).ready(function() {
        $(".deleteButton").on("click", function() {
            var row = $(this).closest('tr');
            var userId = row.find('td:eq(0)').text();
            var companyId = row.find('td:eq(1)').text();
            var statusId = row.find('td:eq(2)').text();
            console.log(userId);
            console.log(companyId);
            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete the company with User ID " + userId + "?")) {
            // User clicked OK, proceed with the deletion
        
            var requestData = {
                "userID": userId,
                "id": companyId,
                "statusId": statusId
            };
        
            // Make an AJAX call to the API
            $.ajax({
                url: '/delete-company/'+userId+'/'+userId, // Fix the URL to use companyId
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    // Handle success response
                    console.log('Company deleted successfully:', response);
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
        </script> --}}

        {{-- <script>
            $(document).ready(function() {
                $('.editButton').on('click', function(e) {
                    e.preventDefault();
                    var companyData = $(this).data('company');
                    $.ajax({
                        url: '/edit-company',
                        method: 'POST',
                        data: {
                            companyData: companyData
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script> --}}
    
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