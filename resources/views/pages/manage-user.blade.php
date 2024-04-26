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
                            <button class="btn btn-secondary">
                                <a href="add-role" class="text-white">{{ __('Add Role')}}</a>
                            </button>
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
                                    <th class="text-white"><b>{{ __('RoleID')}}</b></th>
                                    <th class="text-white"><b>{{ __('RoleName')}}</b></th>
                                    <th class="text-white"><b>{{ __('Reporting To')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roleDetails['Result'] as $role)
                                <tr>
                                    <td class="text-center"><b>{{ $role['RoleID'] }}</b></td>
                                    <td class="text-center">{{ $role['RoleName'] }}</td>
                                    <td class="text-center"></td>
                                    <td>
                                        <div class="table-actions text-center">
                                            <a href="#"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="#"><i class="ik ik-edit-2 text-dark"></i></a>
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

@endsection 


