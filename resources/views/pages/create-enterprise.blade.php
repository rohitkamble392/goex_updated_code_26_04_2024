@extends('layouts.main') 
@section('title', 'Managed Credit Key')
@section('content')


{{-- <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-secondary"></i>
                        <div class="d-inline">
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
                        <h4><b>{{ __('Upload Enterprise File')}}</b></h4>
                        <form method="POST" action="{{ route('add-credit-key') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="base64String"><b>{{ __('Upload JSON File')}}</b></label>
                                    <input type="file" name="base64String" id="base64String" class="form-control">
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><b>{{ __('Create Enterprise')}}</b></h4>
                        <form method="POST" action="{{ route('add-credit-key') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <label for=""><b>{{ __('Enterprise Token')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Enterprise Token">
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <label for=""><b>{{ __('Signup URL')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Signup URL">
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <label for=""><b>{{ __('URL')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter URL">
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><b>{{ __('Create Default Policy')}}</b></h4>
                        <form method="POST" action="{{ route('add-credit-key') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <label for=""><b>{{ __('URL')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter URL">
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for=""><b>{{ __('Enterprise ID')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Enteprise ID">
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <label for=""><b>{{ __('Email')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><b>{{ __('Create QR')}}</b></h4>
                        <form method="POST" action="{{ route('add-credit-key') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <label for=""><b>{{ __('Enteprise ID')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Enterprise ID">
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for=""><b>{{ __('Policy Name')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Policy Name">
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <label for=""><b>{{ __('Path')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Path">
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><b>{{ __('Create Policy')}}</b></h4>
                        <form method="POST" action="{{ route('add-credit-key') }}" >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <label for=""><b>{{ __('Name')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Name">
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for=""><b>{{ __('AMA Enterprise ID')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter AMA Enterprise ID">
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <label for=""><b>{{ __('JSON')}}</b></label>
                                    <input type="" name="" id="" class="form-control" placeholder="Enter Json">
                                </div>
                            </div>
                            <div class="card-header"><button type="submit" class="btn btn-secondary"><b>{{ __('SUBMIT')}}</b></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        /*Background color*/
            /* #grad1 {
                background-color: : #9C27B0;
                background-image: linear-gradient(120deg, #FF4081, #81D4FA);
            } */

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E;
        }

        #msform input, #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            /* font-family: montserrat; */
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px;
        }

        #msform input:focus, #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0;
        }

        /*Blue Buttons*/
        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
        }

        /*Previous Buttons*/
        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
        }

        /*Dropdown List Exp Date*/
        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px;
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue;
        }

        /*The background card*/
        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        #progressbar .active {
            color: #000000;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 20%;
            float: left;
            position: relative;
        }

        /*Icons in the ProgressBar*/
        #progressbar #account:before {
            /* font-family: FontAwesome; */
            content: "\f023";
        }

        #progressbar #personal:before {
            /* font-family: FontAwesome; */
            content: "\f007";
        }

        #progressbar #payment:before {
            /* font-family: FontAwesome; */
            content: "\f09d";
        }

        #progressbar #confirm:before {
            /* font-family: FontAwesome; */
            content: "\f00c";
        }

        /*ProgressBar before any progress*/
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: skyblue;
        }

        /*Imaged Radio Buttons*/
        .radio-group {
            position: relative;
            margin-bottom: 25px;
        }

        .radio {
            display:inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor:pointer;
            margin: 8px 2px; 
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
        }

        /*Fit image in bootstrap div*/
        .fit-image{
            width: 100%;
            object-fit: cover;
        }
            </style>

    <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-9 col-md-7 col-lg-10 text-center p-0 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Create Your Enterprise</strong></h2>
                {{-- <p>Fill all form field to go to next step</p> --}}
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Upload Json</strong></li>
                                <li id="personal"><strong>Create Default Policy</strong></li>
                                <li id="payment"><strong>Create QR</strong></li>
                                <li id="payment"><strong>Create Policy</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Upload Json</h2>
                                    <input type="file" name="base64String" id="base64String"/>
                                </div>
                                <input type="button" name="next" id="uploadjsonBtn" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Create Default Policy</h2>
                                    <label class="pay">URL</label>
                                    <input type="text" name="URL" id="URL" placeholder="Enter URL"/>
                                    <label class="pay">Enterprise ID</label>
                                    <input type="text" name="enterpriseId" id="enterpriseId" placeholder="Enter Enterprise ID"/>
                                    {{-- <label class="pay">Email</label>
                                    <input type="text" name="emails" id="emails" placeholder="Enter Email"/> --}}
                                    <div class="form-group">
                                        <label for="emails" class="pay"><i class="ik ik-mail"></i> {{ __('Email')}}</label>
                                        <input type="email" name="emails" id="emails" placeholder="Enter Email" multiple />
                                        <small class="form-text text-muted">Enter multiple email addresses separated by commas.</small>
                                    </div>
                                    
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Create QR</h2>
                                    <label class="pay">Enterprise ID</label>
                                    <input type="text" name="enterpriseId" id="enterpriseId" placeholder="Enter Enterprise ID"/>
                                    <label class="pay">Policy Name</label>
                                    <input type="text" name="policyName" id="policyName" placeholder="Enter Policy Name"/>
                                    <label class="pay">Path</label>
                                    <input type="text" name="Path" id="Path" placeholder="Enter Path"/>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="make_payment" class="next action-button" value="Confirm"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Create Policy</h2>
                                    <label class="pay">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name"/>
                                    <label class="pay">amA_ENTERPRISE_ID</label>
                                    <input type="text" name="Enterprise ID" id="amA_ENTERPRISE_ID" placeholder="Enter Enterprise ID"/>
                                    <label class="pay">Json</label>
                                    <textarea type="text" name="json" id="json" placeholder="Enter Json"></textarea>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="make_payment" class="next action-button" value="Confirm"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Create Enterprise</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row" style="display: none">
                                <div class="col-sm-12">
                                    <label for="enterpriseToken">{{ __('Enterprise Token')}}</label>
                                    <input type="text" name="enterpriseToken" class="form-control"  placeholder="Enter Enterprise Token">
                                </div>
                                <div class="col-sm-12">
                                    <label for="signupUrl">{{ __('Enterprise Token')}}</label>
                                    <input type="text" name="signupUrl" class="form-control"  placeholder="Enter SignUPURL">
                                </div>
                                <div class="col-sm-12">
                                    <label for="URL">{{ __('URL')}}</label>
                                    <input type="text" name="URL" class="form-control"  placeholder="Enter URL">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $(".previous").click(function(){
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
    
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
        return false;
    })
        
    });

    $(document).ready(function() {

        $('#uploadjsonBtn').on('click', function() {
        var base64String = $('#base64String').val();
        fetchData(base64String);
    });

    function fetchData(base64String) {
    $.ajax({
        url: '/upload-enterprise-file',
        type: 'POST',
        data: {
            base64String: base64String
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function() {
            console.log('Error in AJAX request');
        }
    });
}
});
</script>
@endsection

