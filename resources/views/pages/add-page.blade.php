@extends('layouts.main') 
@section('title', 'Add Page')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-secondary"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('MANAGE PAGES')}}</b></h4>
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
                    <form class="forms-sample" method="post" action="{{ route('create-page') }}">
                        @csrf
                        <input type="hidden" name="isActive" value="1">
                        <input type="hidden" name="createdBy" value="1">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for=""><b>{{ __('Enter Group Id')}}</b><span class="text-red">*</span></label>
                                <input type="text" name="" class="form-control" placeholder="Enter Group ID"/>
                            </div>
                            <div class="col-sm-6">
                                <label for=""><b>{{ __('Enter Page Name')}}</b><span class="text-red">*</span></label>
                                <input type="text" name="" class="form-control" placeholder="Enter Page Name"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary mr-2"><b>{{ __('SUBMIT')}}</b></button>
                        <button class="btn btn-secondary"><b>{{ __('CANCEL')}}</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
