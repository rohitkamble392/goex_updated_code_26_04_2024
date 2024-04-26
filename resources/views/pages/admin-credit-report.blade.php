@extends('layouts.main') 
@section('title', 'Manage Credit Report')
@section('content')
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
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
                            <h4><b>{{ __('Manage Credit Report')}}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('superadmin-dashboard')}}"><i class="ik ik-home text-dark"></i></a>
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
                                    <th class="text-white"><b>{{ __('NumberofKey')}}</b></th>
                                    <th class="text-white"><b>{{ __('KeyType')}}</b></th>
                                    <th class="text-white"><b>{{ __('Req_Mode')}}</b></th>
                                    <th class="text-white"><b>{{ __('DebitBy')}}</b></th>
                                    <th class="text-white"><b>{{ __('CreditTo')}}</b></th>
                                    <th class="text-white"><b>{{ __('key_Rate')}}</b></th>
                                    <th class="text-white"><b>{{ __('Created_on')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admincreditreport['Result'] as $admincreditreport)
                                <tr>
                                    <td class="text-center">{{ $admincreditreport['NumberofKey'] }}</td>
                                    <td class="text-center">{{ $admincreditreport['KeyType'] }}</td>
                                    <td class="text-center">{{ $admincreditreport['Req_Mode'] }}</td>
                                    <td class="text-center">{{ $admincreditreport['DebitBy'] }}</td>
                                    <td class="text-center">{{ $admincreditreport['CreditTo'] }}</td>
                                    <td class="text-center">{{ $admincreditreport['key_Rate'] }}</td>
                                    {{-- <td class="text-center">{{ $admincreditreport['Created_on'] }}</td> --}}
                                    <td class="text-center">{{ date('Y-m-d h:i:s A', strtotime($admincreditreport['Created_on'])) }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a data-toggle="modal" data-target="#demoModal"><i class="ik ik-eye text-dark"></i></a>
                                            <a href="#"><i class="ik ik-edit-2 text-dark"></i></a>
                                            {{-- <a href="edit-company/{{ $company['Com_MobileNo'] }}"><i class="ik ik-edit-2 text-dark"></i></a> --}}
                                            <a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a>
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