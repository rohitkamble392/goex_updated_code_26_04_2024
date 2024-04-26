@extends('layouts.main') 
@section('title', 'Return Keys')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-secondary"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('MANAGE USER')}}</b></h4>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="post" action="{{ route('create-role') }}">
                        @csrf
                        <input type="hidden" name="isActive" value="1">
                        <input type="hidden" name="createdBy" value="1">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="roleName"><b>{{ __('Enter Role')}}</b><span class="text-red">*</span></label>
                                <input type="text" name="roleName" class="form-control" placeholder="Enter Role"/>
                            </div>
                            <div class="col-sm-6">
                                <label for="roleName"><b>{{ __('Reporting To')}}</b><span class="text-red">*</span></label>
                                <select name="reporting_to" id="reporting_to" class="form-control">
                                    @foreach ($roleDetails['Result'] as $role)
                                        <option value="{{ $role['RoleID'] }}">{{ $role['RoleName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary mr-2"><b>{{ __('SUBMIT')}}</b></button>
                        <button class="btn btn-secondary"><b>{{ __('CANCEL')}}</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table table-striped table-hover text-center">
                        <thead class="bg-secondary">
                            <tr>
                                <th class="text-white"><b>{{ __('PageID')}}</b></th>
                                <th class="text-white"><b>{{ __('Name')}}</b></th>
                                <th class="text-white"><b>{{ __('IsActive')}}</b></th>
                                <th class="text-white"><b>{{ __('GroupID')}}</b></th>
                                <th class="text-white"><b>{{ __('GroupName')}}</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Company</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Super Stockist</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Distributor</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Retailer</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Promotor</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Assign Key</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Key Pull Back</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Credit Key Report</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>Debit Key Report</td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <input type="checkbox">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}


</div>

@endsection
