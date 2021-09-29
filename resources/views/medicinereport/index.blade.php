@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-right">
								<br>

									{{-- <a href="{{route('all.medicine')}}">
										<button class="btn btn-success btn-outline">
									All Medicine List
									</button>
									</a> --}}
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{ route('medicinereport.create') }}">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10">Patient ID</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="patient_id" value="{{$checkins->patient_id}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">CheckIn ID</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="checkin_id" value="{{$checkins->id}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Medicine Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-pie-chart"></i></div>
					<select class="form-control" name="medicine_name" required>
					<option>Select</option>
					@foreach($medicines as $row)
					<option>{{$row->medicine_name}}</option>
					@endforeach
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Medicine Mg</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-ban"></i></div>
					<input type="text" class="form-control" name="medicine_mg" placeholder="Enter Medicine Power">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10">Medicine Price</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-credit-card"></i></div>
					<input type="number" class="form-control" name="price" placeholder="Enter Medicine Price" required="">
					</div>
				</div>
                <div class="form-group">
                    <label class="control-label mb-10">Date</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-calender"></i></div>
                        <input type="datetime-local" class="form-control" name="created_at" required="">
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
