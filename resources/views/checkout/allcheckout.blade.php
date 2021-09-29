@extends('master')
@section('content')
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">All Check Out List</h6>
								</div>
								<div class="pull-right">
									<a href="{{route('checkout.index')}}">
										<button class="btn btn-success btn-outline">
									Checked Out
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
		<th>Patient Name</th>
		<th>Swab Test Type</th>
		<th>Swab Test Result</th>
		<th>Test Clearance Note</th>
		<th>Checkout Date</th>
		<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
		<th>SL. No</th>	
		<th>Patient ID</th>
		<th>Swab Test Type</th>
		<th>Swab Test Result</th>
		<th>Test Clearance Note</th>
		<th>Checkout Date</th>
		<th>Action</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($checkouts as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->patient_name }}</td>
							<td>{{ $row->swab_test_type }}</td>
							<td>{{ $row->swab_test_result }}</td>
							<td>{{ $row->test_clearance_note }}</td>	
		<td>{{date('d-m-Y', strtotime($row->checkout_date))}}</td>	

		<td>
	<a href="{{URL::to('show/checkout/'.$row->id.'/'.$row->patient_id)}}">
		<button class="btn btn-success btn-outline">Show</button>
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
				</div>
					
@endsection

