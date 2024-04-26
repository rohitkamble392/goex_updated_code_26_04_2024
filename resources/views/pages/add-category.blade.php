@extends('layouts.main') 
@section('title', 'Add Category')
@section('content')

<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Add Category')}}</b></h3>
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
                        <form class="forms-sample" method="POST" action="{{ route('create-category') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="category_Name">{{ __('Category')}}<span class="text-red">*</span></label>
                                    <input type="text" name="category_Name" class="form-control" placeholder="Enter Category">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="category_Name">{{ __('Description')}}<span class="text-red">*</span></label>
                                    <textarea type="text" name="category_Name" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div> --}}
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid">
@endsection
