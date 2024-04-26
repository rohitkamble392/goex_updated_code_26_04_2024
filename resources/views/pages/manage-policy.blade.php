@extends('layouts.main')
@section('title', 'Manage Enterprise')
@section('content')
@push('head')

@endpush

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-secondary"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('Manage Enterprise')}}</b></h4>
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
                            <a href="add-superstokist">{{ __('Add Enteprise')}}</a>
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
                        <label for="">{{ __('Select Company')}}<span class="text-red">*</span></label>
                        <select name="" class="form-control select2" style="font-size:15px;border-radius:10px;"
                            id="">
                        <option value="">Select Company</option></select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">{{ __('Select retailer')}}<span class="text-red">*</span></label>
                        <select name="" class="form-control select2" style="font-size:15px;border-radius:10px;"
                            id="">
                        <option value="">Select Retailer</option></select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">{{ __('Select Enterprise')}}<span class="text-red">*</span></label>
                        <select name="" class="form-control select2" style="font-size:15px;border-radius:10px;"
                            id="">
                        <option value="">Select Enterprise</option></select>
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
                        <thead class="text-center bg-secondary">
                            <tr>
                                <th class="text-white"><b>{{ __('CompanyID')}}</b></th>
                                <th class="text-white"><b>{{ __('EnterpriseID')}}</b></th>
                                <th class="text-white"><b>{{ __('RetailerID')}}</b></th>
                                <th class="text-white"><b>{{ __('ResellerID')}}</b></th>
                                <th class="text-white"><b>{{ __('ConfigID')}}</b></th>
                                <th class="text-white"><b>{{ __('ZCompanyID')}}</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">LC014k7n5u</td>
                                <td class="text-center">9</td>
                                <td class="text-center">2343</td>
                                <td class="text-center">434</td>
                                <td class="text-center">432</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- push external js -->
@push('script')



<!-- push external js -->
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

<script src="{{ asset('js/get-company.js') }}"></script>
@endpush
@endsection