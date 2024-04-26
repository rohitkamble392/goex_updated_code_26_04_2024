@extends('layouts.main')
@section('title', 'Manage Resolved Tickets')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h5>{{ __('Resolved Ticket') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('superadmin-dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-resolved-ticket') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="resolved_Remarks">{{ __('resolved_Remarks') }}<span class="text-red">*</span></label>
                                    <input name="resolved_Remarks" id="resolved_Remarks" class="form-control" placeholder="Enter resolved_Remarks"></input>
                                    <input type="text" name="ticketID" id="ticketID" value="{{ $TicketID }}">
                                </div>

                                <div class="col-sm-12 col-md-12 mt-2">
                                    <label for="resolvedComment">{{ __('resolvedComment') }}<span class="text-red">*</span></label>
                                    <textarea name="resolvedComment" id="resolvedComment" class="form-control" placeholder="Enter resolvedComment"></textarea>
                                </div>

                                <div class="card-header">
                                    <button type="submit" class="btn btn-secondary">{{ __('Submit') }}</button>
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
         
    </div>
@endsection