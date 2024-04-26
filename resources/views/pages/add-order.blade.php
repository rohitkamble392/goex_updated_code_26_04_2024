@extends('layouts.main') 
@section('title', 'Add Package')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h5><b>{{ __('ADD Package')}}</b></h5>
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
                    <form method="post" action="{{ route('create-package') }}">
                        @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="zoho_ItemID">{{ __('zoho_ItemID')}}<span class="text-red">*</span></label>
                                    <input type="text" name="zoho_ItemID" class="form-control" placeholder="Enter zoho_ItemID">
                                </div>
                                <div class="col-sm-4">
                                    <label for="title">{{ __('title')}}<span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="col-sm-4">
                                    <label for="qty">{{ __('qty')}}<span class="text-red">*</span></label>
                                    <input type="number" name="qty" class="form-control" placeholder="Enter qty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="amount">{{ __('amount')}}<span class="text-red">*</span></label>
                                    <input type="number" name="amount" class="form-control" placeholder="Enter amount">
                                </div>
                                {{-- <div class="col-sm-4">
                                    <label for="iS_Active">{{ __('iS_Active')}}<span class="text-red">*</span></label>
                                    <input type="number" name="iS_Active" class="form-control" placeholder="Enter iS_Active">
                                </div> --}}
                                <div class="col-sm-4">
                                    <label for="iS_Active">{{ __('iS_Active')}}<span class="text-red">*</span></label>
                                    <select name="iS_Active" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="mop">{{ __('mop')}}<span class="text-red">*</span></label>
                                    <input type="text" name="mop" class="form-control" placeholder="Enter mop">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="description">{{ __('description')}}<span class="text-red">*</span></label>
                                    <input type="text" name="description" class="form-control" placeholder="Enter description">
                                </div>
                                <div class="col-sm-4">
                                    <label for="for_Policy">{{ __('for_Policy')}}<span class="text-red">*</span></label>
                                    <input type="number" name="for_Policy" class="form-control" placeholder="Enter for_Policy">
                                </div>
                                <div class="col-sm-4">
                                    <label for="valid_Till">{{ __('valid_Till')}}<span class="text-red">*</span></label>
                                    <input type="date" name="valid_Till" class="form-control" placeholder="Enter valid_Till">
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- <div class="col-sm-4">
                                    <label for="imageURL">{{ __('imageURL')}}<span class="text-red">*</span></label>
                                    <input type="file" name="imageURL" class="form-control" placeholder="Enter imageURL">
                                </div> --}}
                                    <div class="col-sm-4">
                                        <label for="imageURL">{{ __('Upload Company Logo')}}<span class="text-red">*</span></label>
                                        <input type="file" name="imageURL" id="imageURL" class="form-control" placeholder="Upload Company Logo">
                                        <input type="text" name="uploadimgURL" id="uploadimgURL">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="button" name="uploadImgBtn" id="uploadImgBtn" class="form-control" value="Upload">
                                    </div>
                                <div class="col-sm-4">
                                    <label for="days_90_Price">{{ __('days_90_Price')}}<span class="text-red">*</span></label>
                                    <input type="number" name="days_90_Price" class="form-control" placeholder="Enter days_90_Price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="days_180_Price">{{ __('days_180_Price')}}<span class="text-red">*</span></label>
                                    <input type="number" name="days_180_Price" class="form-control" placeholder="Enter days_180_Price">
                                </div>
                                <div class="col-sm-4">
                                    <label for="days_365_Price">{{ __('days_365_Price')}}<span class="text-red">*</span></label>
                                    <input type="number" name="days_365_Price" class="form-control" placeholder="Enter days_365_Price">
                                </div>
                                {{-- <div class="col-sm-4">
                                    <label for="policy_type">{{ __('policy_type')}}<span class="text-red">*</span></label>
                                    <input type="number" name="policy_type" class="form-control" placeholder="Enter policy_type">
                                </div> --}}
                                <div class="col-sm-4">
                                    <label for="policy_type">{{ __('policy_type')}}<span class="text-red">*</span></label>
                                    <select name="policy_type" id="policy_type" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Smart Policy</option>
                                        <option value="2">Regular Policy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
