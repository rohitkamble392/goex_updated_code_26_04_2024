@extends('layouts.main') 
@section('title', 'Edit Not Usin Policy')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Retailer Details')}}</b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card table-card" style="background-color: #cbd0d6;border-radius:20px;padding:20px;">
                    <div class="card-block pb-0">
                        <div class="table-responsive">
                            <table class="table mb-0 without-header">
                                <tbody>
                                    <tr>
                                        <td><p><b>{{ __('Vendor ID : ')}}</b>{{ __('101')}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p><b>{{ __('Shop Name : ')}}</b>{{ __('Top 10')}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p><b>{{ __('Contact Person Name : ')}}</b>{{ __('Vinod')}}</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card table-card" style="background-color: #cbd0d6;border-radius:20px;padding:10px;">
                    <div class="card-block pb-0">
                        <div class="table-responsive" style="border-radius:50px;padding:10px;">
                            <table class="table mb-0 without-header">
                                <tbody style="background-color: #cbd0d6">
                                    <tr>
                                        <td><p><b>{{ __('Address : ')}}</b>{{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit.')}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p><b>{{ __('Mobile : ')}}</b>{{ __('9988114356')}}</p></td>
                                    </tr>
                                    <tr>
                                        <td><p><b>{{ __('Email : ')}}</b>{{ __('vinod@gmail.com')}}</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Policy Details')}}</b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table text-center table-hover table-striped">
                            <thead class="bg-secondary">
                                <tr>
                                    <th class="text-white">{{ __('ID')}}</th>
                                    <th class="text-white">{{ __('Policy Type')}}</th>
                                    <th class="text-white">{{ __('Total Policy')}}</th>
                                    <th class="text-white">{{ __('Used Policy')}}</th>
                                    <th class="text-white">{{ __('Balanced Policy')}}</th>
                                    <th class="text-white">{{ __('Last Usage Policy')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ __('101')}}</td>
                                    <td>{{ __('Regular Policy')}}</td>
                                    <td>{{ __('200')}}</td>
                                    <td>{{ __('175')}}</td>
                                    <td>{{ __('25')}}</td>
                                    <td><p class="bg-secondart" style="color:white;border-radius:10px;padding:2px;text-align:center;width:75%">10 Days Ago</p></td>
                                </tr>
                                <tr>
                                    <td>{{ __('102')}}</td>
                                    <td>{{ __('Smart Policy')}}</td>
                                    <td>{{ __('75')}}</td>
                                    <td>{{ __('40')}}</td>
                                    <td>{{ __('35')}}</td>
                                    <td><p class="bg-secondary" style="color:white;border-radius:10px;padding:2px;text-align:center;width:75%">5 Days Ago</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-secondary"></i>
                        <div class="d-inline">
                            <h5>{{ __('Remark Details')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table text-center table-hover table-striped">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="color:white">{{ __('Ticket ID')}}</th>
                                    <th style="color:white">{{ __('Employee Name')}}</th>
                                    <th style="color:white">{{ __('Remark')}}</th>
                                    <th style="color:white">{{ __('Comments')}}</th>
                                    <th style="color:white">{{ __('Remark Date')}}</th>
                                    <th style="color:white">{{ __('Next Date')}}</th>
                                    <th style="color:white">{{ __('Status')}}</th>
                                    <th style="color:white">{{ __('Check App Usage')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Milind Bankar</td>
                                    <td>Visit Required</td>
                                    <td>After 2 Days Visit Shop</td>
                                    <td>10-02-2024</td>
                                    <td>13-02-2024</td>
                                    <td><p class="bg-secondary" style="color:white;border-radius:10px;padding:2px;text-align:center">Updated</p></td>
                                    <td style="text-align: center">
                                        <a href="#" data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102</td>
                                    <td>Milind Bankar</td>
                                    <td>Visit Required</td>
                                    <td>After 2 Days Visit Shop</td>
                                    <td>10-02-2024</td>
                                    <td>13-02-2024</td>
                                    <td><p class="bg-secondary" style="color:white;border-radius:10px;padding:2px;text-align:center">Updated</p></td>
                                    <td style="text-align: center">
                                        <a href="#" data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye"></i></a>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel"><b>{{ __('Update Details')}}</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('No')}}</th>
                                            <th>{{ __('Shop Name')}}</th>
                                            <th>{{ __('Employee Name')}}</th>
                                            <th>{{ __('Page Title')}}</th>
                                            <th>{{ __('Created At')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>TOP 10</td>
                                            <td>Vinod Patil</td>
                                            <td>Dashboard</td>
                                            <td>2024-02-10:07:28:60</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>



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