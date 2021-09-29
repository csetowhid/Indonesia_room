@extends('admin.master')
@section('content')
<div class="wrapper pa-0">
            <header class="sp-header">
                <div class="form-group mb-0 pull-right">
                    <span class="inline-block pr-10">Already have an account?</span>
                    <a class="inline-block btn btn-info btn-rounded btn-outline" href="{{URL::to('/')}}">Sign In</a>
                </div>
                <div class="clearfix"></div>
            </header>
            
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mb-30">
                                            <h4 class="text-center txt-dark mb-10">Sign in to COVID-19 Isolation Facility</h4>
                                            <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                        </div>  
                                        <div class="form-wrap">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label mb-10" for="exampleInputName_1">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>


                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>

            <div class="form-group">
                    <label class="control-label mb-10" for="mobile">Mobile</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-phone"></i></div>
                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="Enter Mobile Number">
                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
            </div>

            <div class="form-group">
                    <label class="control-label mb-10" for="username">User Name</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-user"></i></div>
                    <input type="text" class="form-control" @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Enter User Name">
                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label mb-10" for="usertype">User Type</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-people"></i></div>
                    <select class="form-control" name="usertype" @error('usertype') is-invalid @enderror" id="usertype" name="usertype" value="{{ old('usertype') }}">
                    <option>Select</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                    </select>
                    @error('usertype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label mb-10" for="active_status">Active Ststus</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-people"></i></div>
                    <select class="form-control" name="active_status" @error('active_status') is-invalid @enderror" id="active_status" name="active_status" value="{{ old('active_status') }}">
                    <option>Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                    @error('active_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label mb-10" for="image">Photo</label>
                    <div class="input-group">
                    <input type="file" name="image" class="form-control @error('IMAGE') is-invalid @enderror">
                    </div>
                </div>

            <div class="form-group">
                <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter pwd">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <label class="pull-left control-label mb-10" for="exampleInputpwd_3">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter pwd">
            </div>
            <div class="form-group">
<div class="clearfix"></div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-info btn-rounded">sign Up</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->   
                </div>
                
            </div>
            <!-- /Main Content -->
        
        </div>

@endsection