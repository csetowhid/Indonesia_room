@extends('master')
@section('content')
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">All Medicines Report</h6>
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
														<th>Patient Name</th>
														<th>Medicine Name</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>	
														<th>Patient Name</th>
														<th>Medicine Name</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($patient_name as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->patient_name }}</td>
							<td>{{ $row->medicine_name }}</td>
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
				</div>
				<!-- /Row -->
@endsection