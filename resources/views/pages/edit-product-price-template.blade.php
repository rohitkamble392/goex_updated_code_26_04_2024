@extends('layouts.main')
@section('title', 'Add Employee')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-secondary"></i>
                    <div class="d-inline">
                        <h4><b>{{ __('Manage Price')}}</b></h4>
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
                {{-- <div class="card-header">
                    <h3>{{ __('Add Employee')}}</h3>
                </div> --}}
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('create-price-template') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="min">{{ __('Min Amount')}}</label>
                                <input type="number" name="min" class="form-control" placeholder="Enter Min Amount">
                                <input type="hidden" name="id" id="id" class="form-control" placeholder="ID" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="max">{{ __('Max Amount')}}</label>
                                <input type="number" name="max" class="form-control" placeholder="Enter Max Amount">
                            </div>
                            {{-- <div class="col-sm-3">
                                <label for="payoutper">{{ __('Percentage')}}</label>
                                <input type="number" name="payoutper" class="form-control" placeholder="Enter Percentage">
                            </div>
                            <div class="col-sm-3">
                                <label for="mrp">{{ __('MRP')}}</label>
                                <input type="number" name="mrp" class="form-control" placeholder="Enter MRP">
                            </div> --}}
                            <div class="col-sm-3">
                                <label for="payoutper">{{ __('Percentage')}}</label>
                                <input type="number" name="payoutper" id="payoutper" class="form-control" placeholder="Enter Percentage" oninput="calculateTotal()">
                            </div>
                            <div class="col-sm-3">
                                <label for="mrp">{{ __('MRP')}}</label>
                                <input type="number" name="mrp" id="mrp" class="form-control" placeholder="Enter MRP" oninput="calculateTotal()">
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <div class="col-sm-3">
                                <label for="payoutAmt">{{ __('Total Amount')}}</label>
                                <input type="number" name="payoutAmt" class="form-control" placeholder="Enter Amount">
                            </div> --}}
                            {{-- <div class="col-sm-3">
                                <label for="payoutAmt">{{ __('Total Amount')}}</label>
                                <input type="number" name="payoutAmt" id="payoutAmt" class="form-control" placeholder="Enter Amount">
                            </div>
                            <div class="col-sm-3">
                                <label for="empPayout">{{ __('Employee Percentage')}}</label>
                                <input type="number" name="empPayout" class="form-control" placeholder="Enter Employee Percentage">
                        </div>
                            <div class="col-sm-3">
                                <label for="empAmt">{{ __('Employee Amount')}}</label>
                                <input type="number" name="empAmt" class="form-control" placeholder="Enter Employee Amount">
                            </div> --}}
                            <div class="col-sm-3">
                                <label for="payoutAmt">{{ __('Total Amount')}}</label>
                                <input type="number" name="payoutAmt" id="payoutAmt" class="form-control" placeholder="Enter Amount" oninput="calculateEmpAmt()">
                            </div>
                            <div class="col-sm-3">
                                <label for="empPayout">{{ __('Employee Percentage')}}</label>
                                <input type="number" name="empPayout" id="empPayout" class="form-control" placeholder="Enter Employee Percentage" oninput="calculateEmpAmt()">
                            </div>
                            <div class="col-sm-3">
                                <label for="empAmt">{{ __('Employee Amount')}}</label>
                                <input type="number" name="empAmt" id="empAmt" class="form-control" placeholder="Enter Employee Amount">
                            </div>
                        </div>
                        <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{
                                    __('SUBMIT')}}</b></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Show Table of Particular Product --}}

    {{-- <div class="row">
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
                    <table id="data_table" class="table table-striped table-hover">
                        <thead class="text-center bg-secondary">
                            <tr>
                                <th class="text-white"><b>{{ __('ID')}}</b></th>
                                <th class="text-white"><b>{{ __('Min')}}</b></th>
                                <th class="text-white"><b>{{ __('Max')}}</b></th>
                                <th class="text-white"><b>{{ __('PayoutPer')}}</b></th>
                                <th class="text-white"><b>{{ __('MRP')}}</b></th>
                                <th class="text-white"><b>{{ __('EMPPayout')}}</b></th>
                                <th class="text-white"><b>{{ __('Product_Name')}}</b></th>
                                <th class="text-white"><b>{{ __('PayoutAmt')}}</b></th>
                                <th class="text-white"><b>{{ __('EMPAmt')}}</b></th>
                            </tr>

{{dd($matchedProduct)}};
                        </thead>
                        <tbody>
                            @foreach ($matchedProduct as $key => $product)
                            <tr>
                                <td class="text-center"><b>{{ $product['ID'] }}</b></td>
                                <td class="text-center">{{ $product['Product_Name'] }}</td>
                                <td class="text-center">{{ $product['Category_Name'] }}</td>
                                <td class="text-center">{{ $product['Validity'] }}</td>
                                <td class="text-center">{{ $product['Claims'] }}</td>
                                <td class="text-center">{{ $product['DeviceAmount'] }}</td>
                                <td class="text-center">{{ $product['Brand_Name'] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-center"><b>{{ $matchedProduct['ID'] }}</b></td>
                            <td class="text-center">{{ $matchedProduct['Product_Name'] }}</td>
                            <td class="text-center">{{ $matchedProduct['Min'] }}</td>
                            <td class="text-center">{{ $matchedProduct['Max'] }}</td>
                            <td class="text-center">{{ $matchedProduct['PayoutPer'] }}</td>
                            <td class="text-center">{{ $matchedProduct['MRP'] }}</td>
                            <td class="text-center">{{ $matchedProduct['EMPPayout'] }}</td>
                            <td class="text-center">{{ $matchedProduct['PayoutAmt'] }}</td>
                            <td class="text-center">{{ $matchedProduct['EMPAmt'] }}</td>
                        </tr>                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}


</div>
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/get-distributors.js') }}"></script>

<script>
    $(document).ready(function(){
        // Get the ID from the URL
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        // Set the ID value to the input field
        $('#id').val(id);
    });
</script>

<script>
    function calculateTotal() {
        // Get the values of percentage and MRP
        let percentage = parseFloat(document.getElementById('payoutper').value);
        let mrp = parseFloat(document.getElementById('mrp').value);
        
        // Calculate the total amount
        let totalAmount = (mrp * percentage) / 100;
        
        // Set the value of the total amount input
        document.getElementById('payoutAmt').value = totalAmount.toFixed(2); // Fixed to 2 decimal places
    }
</script>

<script>
    function calculateEmpAmt() {
        // Get the values of total amount and employee percentage
        let payoutAmt = parseFloat(document.getElementById('payoutAmt').value);
        let empPayout = parseFloat(document.getElementById('empPayout').value);
        
        // Calculate the employee amount
        let empAmt = (payoutAmt * empPayout) / 100;
        
        // Set the value of the employee amount input
        document.getElementById('empAmt').value = empAmt.toFixed(2); // Fixed to 2 decimal places
    }
</script>

@endpush
@endsection