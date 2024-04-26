@extends('layouts.main')
@section('title', 'Add Product')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-secondary"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('Add Product')}}</b></h4>
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

        @include('include.message')
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3>{{ __('Add Distributor')}}</h3>
                </div> --}}
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('create-product') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="product_Name">{{ __('Product Name')}}<span class="text-red">*</span></label>
                                <input type="text" name="product_Name" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="col-sm-4">
                                <label for="validity">{{ __('Validity')}}<span class="text-red">*</span></label>
                                <input type="text" name="validity" class="form-control" placeholder="Enter Validity">
                            </div>
                            <div class="col-sm-4">
                                <label for="claims">{{ __('Claim')}}<span class="text-red">*</span></label>
                                <input type="text" name="claims" class="form-control" placeholder="Enter Claim">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="deviceAmount">{{ __('Device Amount')}}<span class="text-red">*</span></label>
                                <input type="text" name="deviceAmount" class="form-control" placeholder="Enter Device Amount">
                            </div>
                            <div class="col-sm-4">
                                <label for="amaCustomer">{{ __('AMA Customer')}}</label>
                                <select name="amaCustomer" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="noWarrenty">{{ __('Warranty')}}</label>
                                <select name="noWarrenty" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <input type="text" id="categoryValues" name="categoryValues">
                        <div class="form-group row">
                            <div class="col-sm-12 col-xl-6 mb-30">
                                <h4 class="sub-title"><b>{{ __('Select Category')}}</b></h4>
                                <div class="border-checkbox-section">
                                    @foreach($categories['Result'] as $category)
                                    <div class="border-checkbox-group border-checkbox-group-secondary" style="display: block;">
                                        <input class="border-checkbox category-checkbox" type="checkbox" id="checkbox{{$category['ID']}}" name="CategoryID[]" value="{{$category['ID']}}">
                                        <label class="border-checkbox-label" for="checkbox{{$category['ID']}}">{{$category['Category_Name']}}</label>
                                    </div>
                                    <br>
                                @endforeach
                                </div>
                            </div>
                        </div>                 
                        <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{
                                    __('SUBMIT')}}</b></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Add event listener to checkboxes
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.category-checkbox');
        const categoryValuesInput = document.getElementById('categoryValues');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Get selected checkboxes
                const selectedCheckboxes = document.querySelectorAll('.category-checkbox:checked');
                
                // Extract values and join with commas
                const values = Array.from(selectedCheckboxes).map(cb => cb.value).join(',');

                // Set the value of the hidden input field
                categoryValuesInput.value = values;
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/get-superstockist.js') }}"></script>
@endpush
@endsection