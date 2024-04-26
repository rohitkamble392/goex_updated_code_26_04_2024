@extends('layouts.main') 
@section('title', 'Manage Products')
@section('content')
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endpush


    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Manage Products Price')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item">
                                <button class="btn btn-secondary"><a href="add-product" class="text-white">{{ __('Add Product')}}</a></button>
                            </li> --}}
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
                        <table id="simpletable" class="table table-striped table-hover">
                            <thead class="text-center bg-secondary">
                                <tr>
                                    <th class="text-white"><b>{{ __('ID')}}</b></th>
                                    <th class="text-white"><b>{{ __('Category Name')}}</b></th>x
                                    <th class="text-white"><b>{{ __('Product Name')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productpricedetails['Result'] as $product)
                                <tr>
                                    <td class="text-center"><b>{{ $product['ID'] }}</b></td>
                                    <td class="text-center">{{ $product['Category_Name'] }}</td>
                                    <td class="text-center">{{ $product['Product_Name'] }}</td>
                                    <td class="text-center">
                                        <div class="table-actions text-center">
                                            <a href="edit-product-price-template/{{ $product['ID'] }}" class="bg-secondary"><i class="ik ik-edit text-white"></i></a>
                                            <a href="#" class="deleteButton bg-secondary"><i class="ik ik-trash-2 text-white"></i></a>
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
                    <h5 class="modal-title" id="demoModalLabel">{{ __('Update Product')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('update-product') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="product_Name">{{ __('Product Name')}}<span class="text-red">*</span></label>
                                <input type="text" name="product_Name" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="col-sm-6">
                                <label for="validity">{{ __('Validity')}}<span class="text-red">*</span></label>
                                <input type="text" name="validity" class="form-control" placeholder="Enter Validity">
                            </div>
                        </div>                
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="claims">{{ __('Claim')}}<span class="text-red">*</span></label>
                                <input type="text" name="claims" class="form-control" placeholder="Enter Claim">
                            </div>
                            <div class="col-sm-6">
                                <label for="deviceAmount">{{ __('Device Amount')}}<span class="text-red">*</span></label>
                                <input type="text" name="deviceAmount" class="form-control" placeholder="Enter Device Amount">
                            </div>
                        </div>                
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="category">{{ __('Category')}}<span class="text-red">*</span></label>
                                <input type="text" name="category" class="form-control" placeholder="Enter Device Amount">
                            </div>
                            <div class="col-sm-6">
                                <label for="id">{{ __('id')}}<span class="text-red">*</span></label>
                                <input type="hidden" name="id" class="form-control" placeholder="Enter Device Amount">
                            </div>
                        </div>                
                        <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{
                                    __('Update Product')}}</b></button></div>
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
            var product_Name = row.find('td:eq(1)').text();
            console.log(id);
            console.log(product_Name);
            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete the Product with User ID " + id + "?")) {
            // User clicked OK, proceed with the deletion
        
            var requestData = {
                "id": id,
                "product_Name": product_Name,
            };

            // $.ajaxSetup({
            //     headers: {
            //     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        
            // Make an AJAX call to the API
            $.ajax({
                url: '/delete-product/'+id+'/'+product_Name, // Fix the URL to use companyId
                type: 'POST',
                contentType: 'application/json',
                success: function(response) {
                    // Handle success response
                    console.log('Product deleted successfully:', response);
                    // Remove the row from the table
                    row.remove();
                    ajax.reload();
                },
                error: function(error) {
                    // Handle error response
                    console.error('Error deleting product:', error);
                }
            });
            } else {
            // User clicked Cancel, do nothing
            console.log('Deletion canceled by user');
            }
        });
        });
        </script>

        <script>
            $('#demoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var productName = button.data('name');
    var category = button.data('category');
    var validity = button.data('validity');
    var claims = button.data('claims');
    var deviceAmount = button.data('deviceamount');

    // Update the modal's content with the extracted info
    var modal = $(this);
    modal.find('.modal-title').text('Update Product');
    modal.find('input[name="id"]').val(id);
    modal.find('input[name="product_Name"]').val(productName);
    modal.find('input[name="validity"]').val(validity);
    modal.find('input[name="claims"]').val(claims);
    modal.find('input[name="deviceAmount"]').val(deviceAmount);
    modal.find('input[name="category"]').val(category);
    //  .find('#categoryValues').val(category); // Assuming #categoryValues is the input field for category
});

        </script>

    	<!-- push external js -->
        @push('script')
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
       
        
        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>
    
    <!-- push external js -->
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/get-superstockist.js') }}"></script>
    <script src="{{ asset('js/get-company.js') }}"></script>

    @endpush
@endsection