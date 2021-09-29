@extends('master')
@section('content')
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">All Check In List</h6>
								</div>
								<div class="pull-right">
									<a href="{{route('checkin.index')}}">
										<button class="btn btn-success btn-outline">
									Add New Checked In
									</button>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
		<th>SL. No</th>	
		<th>Patient ID</th>
		<th>Room ID</th>
		<th>Admit Date</th>
		<th>Patient Type</th>
		<th>COVID-19 Categories</th>
		<th>Swab Test Type</th>
		<th>Swab Test Result</th>
		<th>Advance Payment</th>
		<th>Add</th>
		<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
		<th>SL. No</th>	
		<th>Patient ID</th>
		<th>Room ID</th>
		<th>Admit Date</th>
		<th>Patient Type</th>
		<th>COVID-19 Categories</th>
		<th>Swab Test Type</th>
		<th>Swab Test Result</th>
		<th>Advance Payment</th>
		<th>Add</th>
		<th>Action</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($patient_name as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->patient_name }}</td>
							<td>{{ $row->room_id }}</td>								
							<td>{{date('d-m-Y', strtotime($row->admit_date))}}</td>
							<td>{{ $row->ptype }}</td>				
							<td>{{ $row->categories }}</td>							
							<td>{{ $row->swab_test_type }}</td>							
							<td>{{ $row->swab_test_result }}</td>
							<td>IDR {{ $row->advance_payment }}</td>
							<td>
		<button class="btn btn-success btn-outline" data-toggle="modal" data-target="#myModal" onclick="findID({{$row->patient_id}},{{$row->id}})">Medical Report</button> <br> <br>
		<button class="btn btn-primary btn-outline" data-toggle="modal" data-target="#meal" onclick="findMealID({{$row->patient_id}},{{$row->id}})">Daily Meal Report</button> <br> <br>
		<a class="btn btn-success btn-outline" href="{{URL::to('medicinereport/index/'.$row->patient_id)}}">Medicine Report</a> 
							</td>
							<td>
	<div class="dropdown">
	<button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle " type="button">View <span class="caret"></span></button>
				<ul role="menu" class="dropdown-menu">
					<li><a href="{{URL::to('medicalreport/show/'.$row->patient_id)}}">Medical Report</a></li>
					<li><a href="{{URL::to('meal/show/'.$row->patient_id)}}">Meal Report</a></li>
					<li><a href="{{URL::to('medicinereport/show/'.$row->patient_id)}}">Medicine Report</a></li>
				</ul>
	</div> <br>
	<a href="{{URL::to('patient/checkout/'.$row->patient_id)}}">
	<button class="btn btn-success btn-outline">Check Out</button>
	</a> 	<br><br>
	<a onclick="confirm('{{URL::to('checkin/delete/'.$row->id)}}')" >
		<button class="btn btn-danger btn-outline">Delete</button>
	</a>
							</td>				
						</tr>
					@endforeach
				</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>

					<!----- Medical Report-------->
					<div  class="panel-wrapper collapse in">
									<div  class="panel-body">
										<!-- sample modal content -->
										<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
	<form method="POST" action="{{ route('medicalreport.create') }}">
		@csrf
													<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h5 class="modal-title" id="myModalLabel">Add Daily Medical Report</h5>
													</div>
													<div class="modal-body">
														<div class="row">

		<div class="col-md-6">
					<input type="hidden" id="patient_id" name="patient_id">
					<input type="hidden" id="checkin_id" name="checkin_id">
			<div class="form-group">
					<label class="control-label mb-10" for="ptype">Doctor Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="doctor_name" placeholder="Enter Doctor Name">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10" for="ptype">Nurse Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="nurse_name" placeholder="Enter Nurse Name">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10" for="date">Date</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-calender"></i></div>
					<input type="date" class="form-control" name="date">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10" for="temperature">Temperature</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-fire"></i></div>
					<input type="text" class="form-control" name="temperature" placeholder="Enter Patient Temperature">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10" for="blood_pressure">Blood Pressure</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-fire"></i></div>
					<input type="text" class="form-control" name="blood_pressure" placeholder="Enter Blood Pressure">
					</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
					<label class="control-label mb-10" for="blood_pressure">Oxygen Saturation</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-fire"></i></div>
					<input type="text" class="form-control" name="oxygen_saturation" placeholder="Enter Patient Oxygen Saturation">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10" for="blood_pressure">Breathing</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-fire"></i></div>
					<input type="text" class="form-control" name="breathing" placeholder="Enter Patient Breathing">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10">Total Cost</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-credit-card"></i></div>
					<input type="number" class="form-control" name="report_cost" placeholder="Enter Total Price" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10 text-left">Notes</label>
					<textarea class="form-control" rows="5" spellcheck="true" name="notes"></textarea>
				</div>

				
		</div>
														</div>
													</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-success">Submit</button>
													</div>
												</form>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
										</div>
										<!-- /.modal -->
										<!-- Button trigger modal -->
										
									</div>
								</div>
					<!------------->


					<!-----------Meal Report--------------->
					<div  class="panel-wrapper collapse in">
									<div  class="panel-body">
										<!-- sample modal content -->
										<div id="meal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
	<form method="POST" action="{{ route('meal.create') }}">
		@csrf
													<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h5 class="modal-title" id="myLargeModalLabel">Add Daily Meal Report</h5>
													</div>
													<div class="modal-body">
														<div class="row">

		<div class="col-md-4">
	<input type="hidden" id="meal_patient_id" name="meal_patient_id">
	<input type="hidden" id="meal_checkin_id" name="meal_checkin_id">
		<div class="form-group">
					<div class="radio">
					<input type="radio" name="meal" value="1" checked="">
					<label for="BreakFast">Morning Snaks</label>
					</div>
			</div>
			<div class="form-group">
					<div class="radio">
					<input type="radio" name="meal" value="2">
					<label for="BreakFast">BreakFast</label>
					</div>
			</div>
			<div class="form-group">
					<div class="radio">
					<input type="radio" name="meal" value="3">
					<label for="Lunch">Lunch</label>
					</div>
			</div>
			<div class="form-group">
					<div class="radio">
					<input type="radio" name="meal" value="4">
					<label for="Afternoon Tea">Afternoon Tea</label>
					</div>
			</div>
			<div class="form-group">
					<div class="radio">
					<input type="radio" name="meal" value="5">
					<label for="Dinner">Dinner</label>
					</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
					<label class="control-label mb-10">Delivered By</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="delivered_by" placeholder="Enter Deliverd Name">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10">Food Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="food_name" placeholder="Enter Food Name">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10">Food Price</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-credit-card"></i></div>
					<input type="number" class="form-control" name="food_price" placeholder="Enter Food Total Price">
					</div>
			</div>
			<div class="form-group">
					<label class="control-label mb-10" for="time">Time</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-calender"></i></div>
					<input type="datetime-local" class="form-control" name="time">
					</div>
				</div>
		</div>
														</div>
													</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-success">Submit</button>
													</div>
												</form>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
										</div>
										<!-- /.modal -->
										<!-- Button trigger modal -->
										
									</div>
								</div>
							</div>
					
				<!-- /Row -->
					<script>
						function findID(patient_id,checkin_id)
						{
							$("#patient_id").val(patient_id);
							$("#checkin_id").val(checkin_id);
						}
						function findMealID(patient_id,checkin_id)
						{
							$("#meal_patient_id").val(patient_id);
							$("#meal_checkin_id").val(checkin_id);
						}
						// function findMedicineID(patient_id,checkin_id)
						// {
						// 	$("#medicine_patient_id").val(patient_id);
						// 	$("#medicine_checkin_id").val(checkin_id);
						// }
					</script>
@endsection

