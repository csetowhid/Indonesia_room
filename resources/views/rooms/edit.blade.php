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
								<form method="POST" action="{{URL::to('room/update/'.$rooms->id)}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label class="control-label mb-10" for="name">Room Name</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-home"></i></div>
											<input type="text" class="form-control" id="name" name="name" value="{{$rooms->name}}">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="name">Floor</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-home"></i></div>
											<input type="text" class="form-control" id="floor" name="floor" value="{{$rooms->floor}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label mb-10" for="name">Building</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-home"></i></div>
											<input type="text" class="form-control" id="building" name="building" value="{{$rooms->building}}">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="username">Room Quality</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-home"></i></div>
											<input type="text" class="form-control" id="quality" name="quality" value="{{$rooms->quality}}">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="price">Price</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-drawar"></i></div>
											<input type="text" class="form-control" id="price" name="price" value="{{$rooms->price}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label mb-10" for="price">Square Feet</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-home"></i></div>
											<input type="text" class="form-control" id="square_feet" name="square_feet" value="{{$rooms->square_feet}}">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="usertype">Availability</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-home"></i></div>
											<select class="form-control" name="availability">
										

				

					@php
					
					if($rooms->availability == 'Yes')
					{
						echo '<option selected value="Yes">Yes</option> <option value="No">No</option>';
					}
					else
					{
						echo '<option value="Yes">Yes</option> <option selected value="No">No</option>';
					}

					
			
					 @endphp
									
												
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="image">Room Image</label>
										<div class="input-group">
											<input type="file" name="image">
											<img src="{{URL::to($rooms->image)}}" style="width:70px; height: 70px;">
											<input type="hidden" name="old_image" value="{{$rooms->image}}">
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