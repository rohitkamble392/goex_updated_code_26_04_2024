@extends('layouts.main') 
@section('title', 'Balanced Policy Details')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

        <div class="page-header">
            <div class="row align-items-end mb-5">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Balanced Policy Details')}}</b></h4>
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

        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-4">
                            {{-- <input type="button" name="" id="" class="form-control" value="Today's Calls" style="background-color:blue;color:white;font-size:15px;border-radius:10px;"> --}}
                            <input type="button" name="" id="" class="form-control bg-secondary" value="Today's Calls" style="color:white;font-size:15px;border-radius:10px;">
                    </div>
                    <div class="col-lg-4">
                            <input type="button" name="" id="" class="form-control bg-secondary" value="Future Calls" style="color:white;font-size:15px;border-radius:10px;">
                    </div>
                    <div class="col-lg-4">
                            <input type="button" name="" id="" class="form-control bg-secondary" value="Missing Calls" style="color:white;font-size:15px;border-radius:10px;">
                    </div>
                </div>
            </div>

        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-4">
                        <label for="">{{ __('From Date')}}<span class="text-red">*</span></label>
                        <input type="date" name="" id="" class="form-control bg-secondary" style="color:white;font-size:15px;border-radius:10px;">
                    </div>
                    <div class="col-lg-4">
                        <label for="">{{ __('To Date')}}<span class="text-red">*</span></label>
                        <input type="date" name="" id="" class="form-control bg-secondary" style="color:white;font-size:15px;border-radius:10px;">
                    </div>
                    <div class="col-lg-4">
                        <label for="">{{ __('Select Employee')}}<span class="text-red">*</span></label>
                        <select name=""  class="form-control bg-secondary" style="color:white;font-size:15px;border-radius:10px;">
                            <option value="">Select Employee</option>
                            <option value="">Milind Bankar</option>
                            <option value="">Sagar Swami</option>
                            <option value="">Vinod Wadkar</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table text-center text-hover text-striped">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="color: white">{{ __('Shop ID')}}</th>
                                    <th style="color: white">{{ __('Shop Name')}}</th>
                                    <th style="color: white">{{ __('Mobile')}}</th>
                                    <th style="color: white">{{ __('Address')}}</th>
                                    <th style="color: white">{{ __('Last Used Policy')}}</th>
                                    <th style="color: white">{{ __('Report')}}</th>
                                    <th style="color: white">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>TOP 10</td>
                                    <td>9955113344</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>20 Days Ago</td>
                                    <td>
                                        <p><b>Status : </b>Call Done</p>
                                        <p><b>Comments : </b>Lorem ipsum dolor sit amet.</p>
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="#" data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="/edit-balanced-policy"><i class="ik ik-edit text-dark"></i></a>
                                            <a href="#" class=""><i class="ik ik-trash-2 text-dark"></i></a>
                                        </div>
                                    </td>
                                </tr>
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
                    <h5 class="modal-title" id="demoModalLabel"><b>{{ __('Update Details')}}</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                            <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="assigner_email">{{ __('Select Remark')}}<span class="text-red">*</span></label>
                                <select type="" name="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Call Done</option>
                                    <option value="">Visit Required</option>
                                    <option value="">Call After 10 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="select_Date">{{ __('Select Date')}}<span class="text-red">*</span></label>
                                <input type="date" name="select_Date" class="form-control" placeholder="Enter Reason Here"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="">{{ __('Select Employee')}}<span class="text-red">*</span></label>
                                <select type="" name="" class="form-control">
                                    <option value="">Select Employee</option>
                                    <option value="">Milind Bankar</option>
                                    <option value="">Sagar Swami</option>
                                    <option value="">Vinod Wadkar</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="assigner_email">{{ __('Enter Comments')}}<span class="text-red">*</span></label>
                                <textarea type="email" name="assigner_email" class="form-control" placeholder="Enter Reason Here"></textarea>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">{{ __('Update')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        $(".deleteButton").on("click", function() {
            var row = $(this).closest('tr');
            var userId = row.find('td:eq(0)').text();
            var companyId = row.find('td:eq(1)').text();
            var statusId = row.find('td:eq(2)').text();
            console.log(userId);
            console.log(companyId);
            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete the retailer with User ID " + userId + "?")) {
            // User clicked OK, proceed with the deletion
        
            var requestData = {
                "userID": userId,
                "id": companyId,
                "statusId": statusId
            };
        
            // Make an AJAX call to the API
            $.ajax({
                url: '/delete-retailer/'+userId+'/'+userId, // Fix the URL to use companyId
                type: 'GET',
                contentType: 'application/json',
                success: function(response) {
                    // Handle success response
                    console.log('Retailer deleted successfully:', response);
                    // Remove the row from the table
                    row.remove();
                },
                error: function(error) {
                    // Handle error response
                    console.error('Error deleting retailer:', error);
                }
            });
            } else {
            // User clicked Cancel, do nothing
            console.log('Deletion canceled by user');
            }
        });
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
    @endpush
@endsection