[3:25 pm, 25/4/2024] Rohit: @extends('layouts.main') 
@section('title', 'Managed Credit Key')
@section('content')


<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-primary"></i>
                        <div class="d-inline">
                            <h5><b>{{ __('Managed Credit Key')}}</b></h5>
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
                        <form method="POST" action="{{ route('add-credit-key') }}" >
                            @csrf
                            <div class="form-group row">
                                {{-- <div class="col-sm-4">
                                    <label for="typeofKey">{{ __('Type of Key')}}</label>
                                    <select name="typeofKey" id="typeofKey" class="form-control">

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="PakageID"><b>{{ __('Select Package')}}</b></label>
                                    <select name="PakageID" id="PakageID" class="form-control">
                                    
                                    </select>
                                </div> --}}
                                <div class="col-sm-4">
                                    <label for="typeofKey">{{ __('Type of Key')}}</label>
                                    <select name="typeofKey" id="typeofKey" class="form-control">
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="PakageID"><b>{{ __('Select Package')}}</b></label>
                                    <select name="PakageID" id="PakageID" class="form-control">
                                    </select>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label for="numberofKey"><b>{{ __('Number of Keys')}}</b></label>
                                    <input type="number" name="numberofKey" id="numberofKey" class="form-control" placeholder="Enter numberofKey">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="key_Rate"><b>{{ __('key Rate')}}</b></label>
                                    <input type="number" name="key_Rate" id="key_Rate" class="form-control" placeholder="Enter key_Rate">
                                </div>
                                <div class="col-sm-4">
                                    <label for="total_Amt"><b>{{ __('Total Amount')}}</b></label>
                                    <input type="number" name="total_Amt" id="total_Amt" class="form-control" placeholder="Enter total_Amt">
                                </div>

                                <div class="col-sm-4">
                                    <label for="user_Type"><b>{{ __('User Type')}}</b></label>
                                    <select name="user_Type" id="user_Type" class="form-control">
                                        @foreach ($roleDetails['Result'] as $role)
                                            <option value="{{ $role['RoleID'] }}">{{ $role['RoleName'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-4">
                                    <label for="assign_To"><b>{{ __('Assign To')}}</b></label>
                                    <select name="assign_To" id="assign_To" class="form-control">
                                      
                                    </select>
                                </div>

                                {{-- <div class="col-sm-4">
                                    <label for="expiryDue"><b>{{ __('Expiry Date')}}</b></label>
                                    <input type="date" name="expiryDue" class="form-control" placeholder="Enter expiryDue">
                                    <select name="expiryDue" id="expiryDue">
                                        <option value="">7 Days</option>
                                        <option value="">1 Month</option>
                                        <option value="">2 Month</option>
                                        <option value="">3 Month</option>
                                        <option value="">6 Month</option>
                                        <option value="">12 Month</option>
                                        <option value="">24 Month</option>
                                    </select>
                                </div> --}}

                                <div class="col-sm-4">
                                    <label for="expiryDue"><b>{{ __('Expiry Date')}}</b></label>
                                    {{-- <input type="date" name="expiryDue" class="form-control" placeholder="Enter expiryDue"> --}}
                                    <select name="expiryDue" id="expiryDueSelect" class="form-control" onchange="calculateExpiry()">
                                        <option value="7">7 Days</option>
                                        <option value="30">1 Month</option>
                                        <option value="60">2 Months</option>
                                        <option value="90">3 Months</option>
                                        <option value="180">6 Months</option>
                                        <option value="365">12 Months</option>
                                        <option value="730">24 Months</option>
                                    </select>
                                </div>

                                {{-- <div class="col-sm-4">
                                    <label for="warranty">{{ __('Warranty')}}</label>
                                    <select name="warranty" id="warranty" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div> --}}

                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-primary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
<script>
    function calculateExpiry() {
        const selectElement = document.getElementById("expiryDueSelect");
        const selectedValue = parseInt(selectElement.options[selectElement.selectedIndex].value);
    
        let expiryDate;
        
        if (selectedValue === 90) {
            // If "3 Months" (90 days) is selected, set expiryDate to 90 days from the current date
            const currentDate = new Date();
            expiryDate = new Date(currentDate.getTime() + selectedValue * 24 * 60 * 60 * 1000);
        } else {
            // For other options, calculate expiryDate based on the selected number of days
            const currentDate = new Date();
            expiryDate = new Date(currentDate.getTime() + selectedValue * 24 * 60 * 60 * 1000);
        }
    
        const formattedExpiryDate = formatDate(expiryDate);
    
        const expiryDueInput = document.getElementById("expiryDue");
        expiryDueInput.setAttribute("name", formattedExpiryDate);
    }
    
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        
        return `${year}-${month}-${day}`;
    }
    </script>

    <script>
        $(document).ready(function () {

        $.ajax({
    url: '/get-package-details',
    type: 'GET',
    success: function (response) {
        $('#typeofKey').empty();
        $('#PakageID').empty(); // Clear the PakageID select options
        
        console.log(response);
        
        let smartPolicyAdded = false; // Flag to check if "Smart Policy" is already added
        
        response.Result.forEach(function (item) {
            if (item.SmartPolicy === 1 && !smartPolicyAdded) {
                $('#typeofKey').append('<option value="' + item.SmartPolicy + '">Smart Policy</option>');
                smartPolicyAdded = true; // Set flag to true after adding "Smart Policy"
            }
            else if (item.SmartPolicy !== 1) {
                $('#typeofKey').append('<option value="' + item.PakageID + '">' + item.SmartPolicy + '</option>');
            }
        });
        
        // Populate PakageID select options where SmartPolicy is 1
        response.Result.forEach(function (item) {
            if (item.SmartPolicy === 1) {
                $('#PakageID').append('<option value="' + item.PakageID + '">' + item.PakageName + '</option>');
            }
        });
    },
    error: function (xhr, status, error) {
        console.error('Error:', error);
    }
});
    
            $('#user_Type').change(function () {
                var usertype = $(this).val();
    
                if (usertype == 1) {
                    // Hide the assign_To div
                    $('#assign_To').closest('.col-sm-4').hide();
                } else {
                    // Show the assign_To div
                    $('#assign_To').closest('.col-sm-4').show();
    
                    if (usertype == 2) {
                        $.ajax({
                            url: '/get-company',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.User_id + '">' + item.Com_Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
    
                    if (usertype == 3) {
                        $.ajax({
                            url: '/get-superstockist',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }

                    if (usertype == 4) {
                        $.ajax({
                            url: '/get-distributor',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }

                    if (usertype == 5) {
                        $.ajax({
                            url: '/get-employee',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }

                    if (usertype == 7) {
                        $.ajax({
                            url: '/get-company-employee',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                    if (usertype == 8) {
                        $.ajax({
                            url: '/get-superstockist-employee',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                    if (usertype == 9) {
                        $.ajax({
                            url: '/get-distributor-employee',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }

                    if (usertype == 6) {
                        $.ajax({
                            url: '/get-retailer',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Shop_Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }

                    if (usertype == 7) {
                        $.ajax({
                            url: '/get-promoter',
                            type: 'GET',
                            success: function (response) {
                                $('#assign_To').empty();
                                console.log(response);
                                response.data.forEach(function (item) {
                                    $('#assign_To').append('<option value="' + item.USerID + '">' + item.Name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                    // Add other conditions for different user types here...
    
                } // Close the else block
            });
        });
    </script>
    

    
<script>
    // Get input elements
    const numberofKeyInput = document.getElementById('numberofKey');
    const keyRateInput = document.getElementById('key_Rate');
    const totalAmtInput = document.getElementById('total_Amt');

    // Add event listeners to numberofKey and keyRate inputs
    numberofKeyInput.addEventListener('input', updateTotalAmt);
    keyRateInput.addEventListener('input', updateTotalAmt);

    // Function to update totalAmt
    function updateTotalAmt() {
        // Get values from inputs
        const numberofKey = parseFloat(numberofKeyInput.value);
        const keyRate = parseFloat(keyRateInput.value);

        // Check if both values are valid numbers
        if (!isNaN(numberofKey) && !isNaN(keyRate)) {
            // Calculate total amount
            const totalAmt = numberofKey * keyRate;

            // Update total_Amt input with calculated value
            totalAmtInput.value = totalAmt.toFixed(2); //toFixed(2) to display two decimal places
        } else {
            // If any of the values is not a valid number, clear total_Amt input
            totalAmtInput.value = '';
        }
    }
</script>
@endsection
