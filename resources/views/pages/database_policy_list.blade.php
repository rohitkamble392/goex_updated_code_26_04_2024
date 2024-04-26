{{-- @extends('layouts.main') 
@section('title', 'Database Policy List')
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
                            <h5><b>{{ __('Database Policy List')}}</b></h5>
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
                        <table id="data_table" class="table table-striped table-hover text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('Policyid')}}</b></th>
                                    <th class="text-white"><b>{{ __('Policy_Name')}}</b></th>
                                    <th class="text-white"><b>{{ __('Front_PolicyName')}}</b></th>
                                    <th class="text-white"><b>{{ __('Is_Active')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($databasepolicylist['Result'] as $policylist)
                                <tr>
                                    <td class="text-center"><b>{{ $policylist['Policyid'] }}</b></td>
                                    <td class="text-center">{{ $policylist['Policy_Name'] }}</td>
                                    <td class="text-center">{{ $policylist['Front_PolicyName'] }}</td>
                                    <td class="text-center">{{ $policylist['Is_Active'] }}</td>
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
@endsection --}}

@extends('layouts.main') 
@section('title', 'Database Policy List')
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
                            <h5><b>{{ __('Database Policy List')}}</b></h5>
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

                    {{-- <div class="card-header"><h3>{{ __('Data Table')}}</h3></div> --}}
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-hover text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('Policyid')}}</b></th>
                                    <th class="text-white"><b>{{ __('Policy_Name')}}</b></th>
                                    <th class="text-white"><b>{{ __('Front_PolicyName')}}</b></th>
                                    <th class="text-white"><b>{{ __('Is_Active')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($databasepolicylist['Result'] as $policylist)
                                <tr>
                                    <td class="text-center policyId"><b>{{ $policylist['Policyid'] }}</b></td>
                                    <td class="text-center policyName">{{ $policylist['Policy_Name'] }}</td>
                                    <td class="text-center">{{ $policylist['Front_PolicyName'] }}</td>
                                    <td class="text-center">{{ $policylist['Is_Active'] }}</td>
                                    <td>
                                        <div class="table-actions text-center">
                                            <a href="#"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="#" class="editButton"><i class="ik ik-edit-2 text-dark"></i></a>
                                            {{-- <a href="edit-company/{{ $company['Com_MobileNo'] }}"><i class="ik ik-edit-2 text-dark"></i></a> --}}
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

    <!-- Modal for editing policy -->
    <div class="modal fade" id="editPolicyModal" tabindex="-1" role="dialog" aria-labelledby="editPolicyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPolicyModalLabel">Enter Front Policy Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing policy -->
                    <form id="editPolicyForm">
                        <!-- Input fields for editing -->
                        <div class="form-group">
                            <label for="Front_PolicyName">Front Policy Name</label>
                            <input type="text" class="form-control" id="Front_PolicyName" name="Front_PolicyName" placeholder="Enter Front Policy Name">
                        </div>
                        <!-- Other input fields for editing -->
                        <!-- Add more fields as needed -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
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

    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Handle click on edit icon
            $('.editButton').click(function() {
                // Get data associated with the row
                var policyId = $(this).closest('tr').find('.policyId').text();
                var policyName = $(this).closest('tr').find('.policyName').text();
                // Populate form fields with data
                $('#editPolicyModal #policyId').val(policyId);
                $('#editPolicyModal #policyName').val(policyName);
                // Show the modal
                $('#editPolicyModal').modal('show');
            });

            // Handle form submission
            $('#editPolicyForm').submit(function(event) {
                event.preventDefault();
                // Perform AJAX request to update the database
                var formData = $(this).serialize();
                $.ajax({
                    url: 'update-policy.php', // Update the URL with your backend endpoint
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        alert('Policy updated successfully');
                        // Close the modal
                        $('#editPolicyModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                        alert('An error occurred while updating the policy');
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
