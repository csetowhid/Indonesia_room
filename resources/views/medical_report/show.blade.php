@extends('master')
@section('content')
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>SL. No</th>
														<th>Doctor Name</th>
														<th>Nurse Name</th>
														<th>Date</th>
														<th>Temperature</th>
														<th>Blood Pressure</th>
														<th>Oxygen Saturation</th>
														<th>Breathing</th>
														<th>Report Cost</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>
														<th>Doctor Name</th>
														<th>Nurse Name</th>
														<th>Date</th>
														<th>Temperature</th>
														<th>Blood Pressure</th>
														<th>Oxygen Saturation</th>
														<th>Breathing</th>
														<th>Report Cost</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($medical_report as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->doctor_name }}</td>
							<td>{{ $row->nurse_name }}</td>
							<td>{{date('d-m-Y', strtotime($row->date))}}</td>
							<td>{{ $row->temperature }}</td>
							<td>{{$row->blood_pressure}}</td>
							<td>{{$row->oxygen_saturation}}</td>
							<td>{{$row->breathing}}</td>
							<td>{{$row->report_cost}}</td>

						</tr>
					@endforeach
				</tbody>
											</table> <br>
											<a class="btn btn-success btn-outline" href="{{route('all.checkin')}}">Back</a> 
										</div>
									</div>
								</div>
							</div>
						</div>	

					</div>
				</div>
				<!-- /Row -->
@endsection