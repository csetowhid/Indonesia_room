@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="pull-right">
								<br>
									<a href="{{route('all.room')}}">
										<button class="btn btn-success btn-outline">
									Room List
									</button>
									</a>
								</div>
							<div class="panel panel-default card-view">

								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{ route('room.create') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="name">Room Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" id="name" name="name" placeholder="Room Name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="name">Building</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" id="building" name="building" placeholder="Building Name">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="username">Room Quality</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" id="quality" name="quality" placeholder="Quality Status" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="price">Price</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-drawar"></i></div>
					<input type="text" class="form-control" id="price" name="price" placeholder="Enter Room Price " required>
					</div>
				</div>
{{--				<div class="form-group">--}}
{{--					<label class="control-label mb-10" for="price">Square Feet</label>--}}
{{--					<div class="input-group">--}}
{{--					<div class="input-group-addon"><i class="icon-home"></i></div>--}}
{{--					<input type="text" class="form-control" id="square_feet" name="square_feet" placeholder="Enter Room Size" required>--}}
{{--					</div>--}}
{{--				</div>--}}

				<div class="form-group">
					<label class="control-label mb-10" for="usertype">Availability</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<select class="form-control" name="availability" required>
					<option>Select</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="image">Room Image</label>
					<div class="input-group">
					<input type="file" name="image">
					</div>
				</div>

				<button type="submit" class="btn btn-success mr-10">Submit</button>

													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<!-- /Row -->

@endsection
