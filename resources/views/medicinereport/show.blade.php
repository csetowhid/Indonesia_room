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
														<th>Medicine Name</th>
														<th>Medicine Power</th>
														<th>Medicine Price</th>
														<th>Date</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>
														<th>Medicine Name</th>
														<th>Medicine Power</th>
														<th>Medicine Price</th>
														<th>Date</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($medicine_report as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->medicine_name }}</td>
							<td>{{ $row->medicine_mg }}</td>
							<td>{{ $row->price }}</td>
							<td>{{ $row->created_at }}</td>
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
