@extends('layouts.main') 
@section('title', 'Add Company')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-primary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Upload Enteprise Details')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form id="enterprise_details" method="post" action="#" enctype='multipart/form-data'>
                        @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="companid">{{ __('Company ID')}}</label>
                                    <input type="text" name="companid" id="companid" class="form-control" placeholder="Enter Company ID" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label for="EnterpriseID">{{ __('Enterprise ID')}}</label>
                                    <input type="text" name="EnterpriseID" id="EnterpriseID" class="form-control" placeholder="Enter Enterprise ID" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">{{ __('Retailer ID')}}</label>
                                    <input type="text" name="RetailerID" id="RetailerID" class="form-control" placeholder="Enter Retailer ID" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">{{ __('Reseller ID')}}</label>
                                    <input type="text" name="ResellerID" id="ResellerID" class="form-control" placeholder="Enter Reseller ID" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">{{ __('Config ID')}}</label>
                                    <input type="text" name="ConfigID" id="ConfigID" class="form-control" placeholder="Enter Config ID" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">{{ __('ZCompany ID')}}</label>
                                    <input type="text" name="ZCompanyID" id="ZCompanyID" class="form-control" placeholder="Enter ZCompany ID" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">{{ __('Upload Json')}}</label>
                                    <input type="file" name="jsonfile" id="jsonfile" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">{{ __('Upload QR')}}</label>
                                    <input type="file" name="QRfile" id="QRfile" class="form-control">
                                </div>
                            </div>
                            <div class="card-header">
                                <button type="button" class="btn btn-primary"
                                    id="ajaxButton">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
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
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-white"><b>{{ __('CompanyID')}}</b></th>
                                    <th class="text-white"><b>{{ __('EnterpriseID')}}</b></th>
                                    <th class="text-white"><b>{{ __('RetailerID')}}</b></th>
                                    <th class="text-white"><b>{{ __('ResellerID')}}</b></th>
                                    <th class="text-white"><b>{{ __('ConfigID')}}</b></th>
                                    <th class="text-white"><b>{{ __('ZCompanyID')}}</b></th>
                                    {{-- <th class="nosort text-white"><b>{{ __('Action')}}</b></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewcompanyretailerenterprise['Result'] as $enteprise)
                                <tr>
                                    <td class="text-center">{{ $enteprise['CompanyID'] }}</td>
                                    <td class="text-center">{{ $enteprise['EnterpriseID'] }}</td>
                                    <td class="text-center">{{ $enteprise['RetailerID'] }}</td>
                                    <td class="text-center">{{ $enteprise['ResellerID'] }}</td>
                                    <td class="text-center">{{ $enteprise['ConfigID'] }}</td>
                                    <td class="text-center">{{ $enteprise['ZCompanyID'] }}</td>
                                    {{-- <td>
                                        <div class="table-actions">
                                            <a href="#"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="#"><i class="ik ik-edit-2 text-dark"></i></a>
                                            <a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a>
                                        </div>
                                    </td> --}}
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

            $('#ajaxButton').on('click', function() {
                fetchData();
            });
            
            function fetchData() {
                $.ajax({
                    url: '/manage-enterprise-details',
                    type: 'POST',
                    data: $('#enterprise_details').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data.Result[0]);
                    },
                    error: function() {
                        console.log('Error in AJAX request');
                    }
                });
            }
          
        });

    $(document).ready(function() {
        $('#uploadImgBtn').click(function() {
            var fileInput = $('#imageURL')[0].files[0];
            if (fileInput) {
                var formData = new FormData();
                formData.append('image', fileInput);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/upload-image',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                    },
                    success: function(response) {
                        $('#uploadimgURL').val(response.message);
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON.message;
                        $('#uploadimgURL').val(errorMessage);
                    }
                });
            } else {
                $('#message').text('Please select an image to upload.');
            }
        });
    });
</script>
@endsection
