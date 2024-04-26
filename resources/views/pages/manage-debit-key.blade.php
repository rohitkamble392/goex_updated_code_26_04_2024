@extends('layouts.main') 
@section('title', 'Managed Debit Key')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}"> 


<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-primary"></i>
                        <div class="d-inline">
                            <h5><b>{{ __('Managed Debit Key')}}</b></h5>
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

        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="user_Type"><b>{{ __('User Type')}}</b><span class="text-red">*</span></label>
                        <select name="user_Type" id="user_Type" class="form-control">
                            @foreach ($roleDetails['Result'] as $role)
                                <option value="{{ $role['RoleID'] }}">{{ $role['RoleName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="assign_To"><b>{{ __('Assign To')}}</b><span class="text-red">*</span></label>
                        <select name="assign_To" id="assign_To" class="form-control">
                          
                        </select>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary" id="ajaxButton">{{ __('Search') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-hover">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-white"><b>{{ __('Package Details')}}</b></th>
                                    <th class="text-white"><b>{{ __('Key Details')}}</b></th>
                                    <th class="nosort text-white"><b>{{ __('Action')}}</b></th>
    
                                </tr>
                            </thead>
                            <tbody>
    
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
                    <h5 class="modal-title" id="demoModalLabel">{{ __('Debit Key')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('add-debit-key') }}" >
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="numberofKey"><b>Number of Keys (Max Allowed<span id="numberofKeylbl"></span>)</b></label>
                                {{-- <input type="number" name="numberofKey" class="form-control" placeholder="Enter numberofKey"> --}}
                                <input type="number" name="numberofKey" id="numberofKey" class="form-control">
                                <input type="text" name="SmartPolicy" id="SmartPolicy" class="form-control">
                                <input type="text" name="RegPolicy" id="RegPolicy" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="key_Rate"><b>{{ __('Per Key Amount')}}</b></label>
                                <input type="number" name="key_Rate" class="form-control" placeholder="Enter key_Rate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="total_Amt"><b>{{ __('Total Amount')}}</b></label>
                                <input type="number" name="total_Amt" class="form-control" placeholder="Enter total_Amt">
                            </div>
                            <div class="col-sm-6">
                                <label for="expiryDue"><b>{{ __('Expiry Date')}}</b></label>
                                <input type="date" name="expiryDue" class="form-control" placeholder="Enter expiryDue">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="warranty">{{ __('Warranty')}}</label>
                                <select name="warranty" id="warranty" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" id="debitkey"><b>{{ __('SUBMIT')}}</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        $(document).ready(function () {

            
            $.ajax({
                url: '/get-products',
                type: 'GET',
                success: function (response) {
                    $('#pakageID').empty();
                    console.log(response);
                    response.data.forEach(function (item) {
                        $('#pakageID').append('<option value="' + item.ID + '">' + item.Product_Name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });  
         

            $('#user_Type').change(function(){


                //get product code here
        
                var usertype = $(this).val();

                if(usertype== 2)
                {
                    $.ajax({
                        url: '/get-company',
                        type: 'GET',
                        success: function (response) {
                            $('#assign_To').empty();
                            console.log(response);
                            response.data.forEach(function (item) {
                                $('#assign_To').append('<option value="' + item.User_id + '">' + item.Com_Name + '</option>');
                                console.log('User_id: ' + item.User_id + ', Com_Name: ' + item.Com_Name);
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });  
                }
                if(usertype==3)
                {
                    $.ajax({
                    url: '/get-superstockist',
                    type: 'GET',
                    success: function(response) {
                        $('#assign_To').empty();
                        // Iterate over the data and append options
                        response.data.forEach(function(item) {
                        $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                        }
                    );
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
                }
                if(usertype==4)
                {
                    $.ajax({
                    url: '/get-distributor',
                    type: 'GET',
                    success: function(response) {
                        $('#assign_To').empty();
                        // Iterate over the data and append options
                        response.data.forEach(function(item) {
                        $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                        }
                    );
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
                }
                if(usertype==5)
                {
                    $.ajax({
                    url: '/get-employee',
                    type: 'GET',
                    success: function(response) {
                        $('#assign_To').empty();
                        // Iterate over the data and append options
                        response.data.forEach(function(item) {
                        $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                        }
                    );
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
                }
                if(usertype==6)
                {
                    $.ajax({
                    url: '/get-retailer',
                    type: 'GET',
                    success: function(response) {
                        $('#assign_To').empty();
                        // Iterate over the data and append options
                        response.data.forEach(function(item) {
                        $('#assign_To').append('<option value="' + item.USerID + '">' + item.Shop_Name   + '</option>');
                        }
                    );
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
                }          
            });               
});
    </script>

<script>
    $(document).ready(function() {

        $('#ajaxButton').on('click', function() {
            var assign_To = $('#assign_To').val();
            fetchData(assign_To);
        });

        $('#debitkey').on('click', function() {
            var numberofKey = $('#numberofKey').val();
            var key_Rate = $('#key_Rate').val();
            var total_Amt = $('#total_Amt').val();
            var expiryDue = $('#expiryDue').val();
            fetchData(assign_To);
        });

        function fetchData(assign_To) {
    $.ajax({
        url: '/check-balance',
        type: 'POST',
        data: {
            checkbalance: assign_To // Change the key to match the expected input key in the controller
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
                    var tbody = $('#data_table tbody');
                    tbody.empty(); // Clear previous data

                    console.log(data);
                    data.Result.forEach(function(item) {
                        var row = $('<tr>');
                        var td1 = $('<td>');
                        var td2 = $('<td>');
                        td1.append($('<p>').text('Username : ' + item.UserName));
                        td1.append($('<p>').text('Package Name : ' + item.PakageName));
                        if(item.SmartPolicy==1)
                        {
                            td1.append($('<span class="badge bg-danger text-white">Smart Policy</span>'));
                        }

                        if(item.RegPolicy==1)
                        {
                            td1.append($('<span class="badge bg-danger text-white">Regular Policy</span>'));
                        }
                        td2.append($('<p>').text('Phone Number : ' + item.PhoneNumber));
                        td2.append($('<p>').text('Number of Keys : ' + item.NumberofKey));
                        td2.append($('<p>').text('Balance Key : ' + item.balKey));
                        td2.append($('<p>').text('Utilized Keys : ' + item.UtilizeKey));
                        td2.append($('<p>').text('Assigner : ' + item.SeniorName));
                        row.append(td1);
                        row.append(td2);
                        // Append the table actions cell
                        var tableActionsCell = $('<td>'); // Create a table cell
                        var tableActionsDiv = $('<div>').addClass('table-actions'); // Create a div for table actions
                        tableActionsDiv.css({
                            display: 'flex',
                            justifyContent: 'center',
                            alignItems: 'center'
                        }); // Center the content vertically and horizontally
                        // tableActionsDiv.append('<a data-toggle="modal" data-target="#demoModal"><span class="badge bg-primary text-white">Debit Key</span></a>'); // Append eye icon
                        tableActionsDiv.append('<a data-toggle="modal" data-target="#demoModal" data-numberofkey="' + item.NumberofKey + '" data-SmartPolicy="' + item.SmartPolicy + '" data-RegPolicy="' + item.RegPolicy + '"><span class="badge bg-primary text-white">Debit Key</span></a>');
                        // tableActionsDiv.append('<a href="#"><i class="ik ik-edit-2 text-dark"></i></a>'); // Append edit icon
                        // tableActionsDiv.append('<a href="#" class="deleteButton"><i class="ik ik-trash-2 text-dark"></i></a>'); // Append trash icon
                        tableActionsCell.append(tableActionsDiv); // Append table actions div to the table cell
                        row.append(tableActionsCell); // Append table actions cell to the table row
                        tbody.append(row);
                    });
                },
        error: function(xhr, status, error) {
            console.error('Error in AJAX request:', error);
            console.log(xhr.responseText); // Log the detailed error message
        }
    });
}

// This code will be placed outside of your AJAX success function
$('#demoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var numberOfKeys = button.data('numberofkey'); // Extract numberofKey value from data-numberofkey attribute
    var SmartPolicy = button.data('smartpolicy'); // Extract numberofKey value from data-numberofkey attribute
    var RegPolicy = button.data('regpolicy'); // Extract numberofKey value from data-numberofkey attribute

    alert(RegPolicy);
    // Set the value of the numberofKey input field in the modal
    $('#numberofKey').val(numberOfKeys);
    $('#SmartPolicy').val(SmartPolicy);
    $('#RegPolicy').val(RegPolicy);
    $('#numberofKeylbl').text(numberOfKeys);
});


});
</script>
@endsection
