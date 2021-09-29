@extends('master')
@section('content')
					<div class="container-fluid">

					<!-- Row -->
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view">
								<div class="row">
								<div class="col-lg-6 col-md-6">
								<div class="panel-heading">
								<h5><strong>Room Name</strong></h5>
								<h1 class="panel-title txt-dark">{{$rooms->name}}</h1>
								<div class="clearfix"></div>
								</div>
								</div>
{{--								<div class="col-lg-6 col-md-6">--}}
{{--								<div class="panel-heading">--}}
{{--								<h5><strong>Floor Name</strong></h5>--}}
{{--								<h1 class="panel-title txt-dark">{{$rooms->floor}}</h1>--}}
{{--								<div class="clearfix"></div>--}}
{{--								</div>--}}
{{--								</div>--}}
								<div class="col-lg-6 col-md-6">
								<div class="panel-heading">
								<h5><strong>Bulding Name</strong></h5>
								<h1 class="panel-title txt-dark">{{$rooms->building}}</h1>
								<div class="clearfix"></div>
								</div>
								</div>
								<div class="col-lg-6 col-md-6">
								<div class="panel-heading">
								<h5><strong>Room Quality</strong></h5>
								<h1 class="panel-title txt-dark">{{$rooms->quality}}</h1>
								<div class="clearfix"></div>
								</div>
								</div>
								<div class="col-lg-6 col-md-6">
								<div class="panel-heading">
								<h5><strong>Room Price</strong></h5>
								<h1 class="panel-title txt-dark">$ {{$rooms->price}}</h1>
								<div class="clearfix"></div>
								</div>
								</div>
{{--								<div class="col-lg-6 col-md-6">--}}
{{--								<div class="panel-heading">--}}
{{--								<h5><strong>Room Size</strong></h5>--}}
{{--								<h1 class="panel-title txt-dark">{{$rooms->square_feet}} Square Foot</h1>--}}
{{--								<div class="clearfix"></div>--}}
{{--								</div>--}}
{{--								</div>--}}
								<div class="col-lg-6 col-md-6">
								<div class="panel-heading">
								<h5><strong>Availability</strong></h5>
								<h1 class="panel-title txt-dark">{{$rooms->availability}}</h1>
								<div class="clearfix"></div>
								</div>
								</div>

								</div>
								<a href="{{route('all.room')}}">
	<button class="btn btn-success btn-outline" style="margin: 20px;">Back</button>
	</a>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<div class="panel panel-default card-view panel-refresh">
								<div class="refresh-container">
									<div class="la-anim-1"></div>
								</div>
								<div class="panel-heading">
									<img src="{{URL::to($rooms->image)}}" alt="No Image Available" style="width:100%; height: 100%;">
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

					</div>

@endsection
