@extends('master')
@section('content')
				<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>SL. No</th>
														<th>Food Name</th>
														<th>Delivered Time</th>
														<th>Food Price</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>
														<th>Food Name</th>
														<th>Delivered Time</th>
														<th>Food Price</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($meal_report as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->food_name }}</td>
							<td>{{ $row->time }}</td>
							<td>{{ $row->food_price }}</td>
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
				</div>
				<!-- /Row -->
@endsection