@extends('layouts.main')
@section('title', 'Add Task List')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-secondary"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('Add Task List')}}</b></h4>
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
                    <form class="forms-sample" method="POST" action="{{ route('create-task-list') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="taskName">{{ __('TaskName')}}<span class="text-red">*</span></label>
                                <input type="text" name="taskName" class="form-control" placeholder="Enter TaskName">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/get-superstockist.js') }}"></script>
@endpush
@endsection