{{-- @extends('layouts.main')
@section('title', 'Manage Category')
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
                        <h4><b>{{ __('Manage Categories')}}</b></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
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
                                <input type="text" name="category_Name" class="form-control" placeholder="Enter Category" autocomplete="off">
                            </div>
                            <div class="col-sm-4">
                                <label for="">{{ __('')}}</label>
                                <button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="simpletable" class="table table-striped table-hover">
                        <thead class="text-center bg-secondary">
                            <tr>
                                <th class="text-white"><b>{{ __('Category ID')}}</b></th>
                                <th class="text-white"><b>{{ __('Category Name')}}</b></th>
                                <th class="text-white"><b>{{ __('Created Date')}}</b></th>
                                <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorydetails['Result'] as $category)
                            <tr>
                                <td class="text-center"><b>{{ $category['ID'] }}</b></td>
                                <td class="text-center">{{ $category['Category_Name'] }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($category['Created_Date'])->format('j F, Y g:i A') }}</td>
                                <td class="text-center">
                                    <div class="table-actions text-center">
                                        <button class="bg-secondary" type="button" data-toggle="modal" data-target="#demoModal" data-id="{{ $category['ID'] }}" data-name="{{ $category['Category_Name'] }}"><i class="ik ik-edit-2 text-white"></i></button>
                                        <button href="#" class="deleteButton bg-secondary"><i class="ik ik-trash-2 text-white"></i></button>
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

<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">{{ __('Update Category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('update-category') }}" >
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="category_Name">{{ __('Update Category')}}</label>
                            <input type="text" name="category_Name" id="category_Name" class="form-control" placeholder="Enter Category" autocomplete="off">
                            <input type="hidden" name="category_ID" id="category_ID">
                        </div>
                    </div>
                    <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('Update')}}</b></button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $(".deleteButton").on("click", function() {
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        var category_Name = row.find('td:eq(1)').text();
        var brand_ID = row.find('td:eq(2)').text();
        console.log(id);
        console.log(category_Name);
        if (confirm("Are you sure you want to delete the Category with User ID " + id + "?")) {
    
        var requestData = {
            "id": id,
            "category_Name": category_Name,
        };
  
        $.ajax({
            url: '/delete-category/'+id+'/'+category_Name, 
            type: 'GET',
            contentType: 'application/json',
            success: function(response) {
                console.log(response);
                alert('Category deleted successfully');
                row.remove();
            },
            error: function(error) {
                console.log(error);
               alert('Error deleting category');
            }
        });
        } else {
        console.log('Deletion canceled by user');
        }
        ajax.reload();
    });
    });
    </script>

<script>
    $(document).ready(function() {
        $(".editButton").on("click", function() {
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text(); 
            var categoryName = row.find('td:eq(1)').text(); 

            var requestData = {
                "id": id,
                "categoryName": categoryName,
            };

            $.ajax({
                url: '/edit-category/' + id,
                type: 'GET',
                data: requestData,
                success: function(response) {
                    alert(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#demoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var categoryId = button.data('id'); 
            var categoryName = button.data('name'); 
            
            var modal = $(this);
            modal.find('#category_ID').val(categoryId);
            modal.find('#category_Name').val(categoryName);
        });
    });
</script>




@push('script')



<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

<script src="{{ asset('js/get-company.js') }}"></script>
@endpush
@endsection --}}

@extends('layouts.main')
@section('title', 'Manage Category')
@section('content')
@push('head')

@endpush

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-box bg-success"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('Manage Categories')}}</b></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        {{-- Breadcrumb links --}}
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
                            <div class="col-sm-3">
                                <input type="text" name="category_Name" class="form-control" placeholder="Enter Category" autocomplete="off" required>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-success btn-block">{{ __('SUBMIT')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="categoryTable" class="table table-bordered table-hover text-center">
                        <thead class="text-center bg-primary text-white">
                            <tr>
                                <th class="text-white">{{ __('Category ID')}}</th>
                                <th class="text-white">{{ __('Category Name')}}</th>
                                <th class="text-white">{{ __('Created Date')}}</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorydetails['Result'] as $category)
                            <tr>
                                <td>{{ $category['ID'] }}</td>
                                <td>{{ $category['Category_Name'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($category['Created_Date'])->format('j F, Y g:i A') }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm editButton" data-toggle="modal" data-target="#demoModal" data-id="{{ $category['ID'] }}" data-name="{{ $category['Category_Name'] }}"><i class="ik ik-edit-2"></i></button>
                                    <button class="btn btn-danger btn-sm deleteButton"><i class="ik ik-trash-2"></i></button>
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

{{-- <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">{{ __('Update Category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('update-category') }}" >
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="category_Name">{{ __('Update Category')}}</label>
                            <input type="text" name="category_Name" id="category_Name" class="form-control" placeholder="Enter Category" autocomplete="off">
                            <input type="hidden" name="category_ID" id="category_ID">
                        </div>
                    </div>
                    <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('Update')}}</b></button></div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="demoModalLabel">Update Category</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('update-category') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_Name">Category Name</label>
                        <input type="text" name="category_Name" id="category_Name" class="form-control" placeholder="Enter Category Name" autocomplete="off" required>
                        <input type="hidden" name="category_ID" id="category_ID">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    $(".deleteButton").on("click", function() {
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        var category_Name = row.find('td:eq(1)').text();
        var brand_ID = row.find('td:eq(2)').text();
        console.log(id);
        console.log(category_Name);
        if (confirm("Are you sure you want to delete the Category with User ID " + id + "?")) {
    
        var requestData = {
            "id": id,
            "category_Name": category_Name,
        };
  
        $.ajax({
            url: '/delete-category/'+id+'/'+category_Name, 
            type: 'GET',
            contentType: 'application/json',
            success: function(response) {
                console.log(response);
                alert('Category deleted successfully');
                row.remove();
            },
            error: function(error) {
                console.log(error);
               alert('Error deleting category');
            }
        });
        } else {
        console.log('Deletion canceled by user');
        }
        ajax.reload();
    });
    });
    </script>

<script>
    $(document).ready(function() {
        $(".editButton").on("click", function() {
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text(); 
            var categoryName = row.find('td:eq(1)').text(); 

            var requestData = {
                "id": id,
                "categoryName": categoryName,
            };

            $.ajax({
                url: '/edit-category/' + id,
                type: 'GET',
                data: requestData,
                success: function(response) {
                    alert(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#demoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var categoryId = button.data('id'); 
            var categoryName = button.data('name'); 
            
            var modal = $(this);
            modal.find('#category_ID').val(categoryId);
            modal.find('#category_Name').val(categoryName);
        });
    });
</script>

@push('script')
<!-- DataTables -->
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('js/manage-category.js') }}"></script>
<script src="{{ asset('js/get-company.js') }}"></script>

@endpush

@endsection
