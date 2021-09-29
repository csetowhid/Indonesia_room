@extends('admin.master')
@section('content')
<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<!-- <a href="index-2.html">
						<img class="brand-img mr-10" src="../img/logo.png" alt="brand"/>
						<span class="brand-text">doodle</span>
					</a> -->
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="{{URL::to('/register')}}">Sign Up</a>
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
		<form method="POST" action="{{ route('login') }}">
			@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="email">Email address</label>
					<input id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">
					@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="form-group">
					<label class="pull-left control-label mb-10" for="password">Password</label>
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a>
													<div class="clearfix"></div>
					<input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter pwd">
					@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
												
					<div class="form-group">
						<div class="checkbox checkbox-primary pr-10 pull-left">

							 <input id="checkbox_2" class="form-check-input" required type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

							<label for="checkbox_2"> Keep me logged in</label>
						</div>
						<div class="clearfix"></div>
					</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">sign in</button>
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
