@extends('master')
@section('content')
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Setting List</h6>
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
														<th>Company Name</th>
														<th>Company Logo</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Signature Name</th>
														<th>Signature Image</th>
														<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>
														<th>Company Name</th>
														<th>Company Logo</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Signature Name</th>
														<th>Signature Image</th>
														<th>Action</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($settings as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->company_name }}</td>
						<td><img src="{{URL::to($row->company_logo)}}" style="width:70px; height: 70px;"></td>
							<td>{{ $row->mobile }}</td>
							<td>{{ $row->address }}</td>
							<td>{{ $row->signature_name }}</td>
							<td><img src="{{URL::to($row->signature_image)}}" style="width:70px; height: 70px;"></td>

							<td>
	<a href="{{URL::to('settings/edit/'.$row->id)}}">
	<button class="btn btn-success btn-outline">Edit</button>
	</a>

{{-- 	<a onclick="confirm('{{URL::to('settings/delete/'.$row->id)}}')" >
		<button class="btn btn-danger btn-outline">Delete</button>
	</a>
 --}}

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
				<!-- /Row -->
@endsection
