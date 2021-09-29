@extends('master')
@section('content')
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">All Medicines List</h6>
								</div>
								<div class="pull-right">
									<a href="{{route('medicine.index')}}">
										<button class="btn btn-success btn-outline">
									Add New Medicine
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
														<th>Medicine Name</th>
														<th>Medicine Mg</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>	
														<th>Medicine Name</th>
														<th>Medicine Mg</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($medicines as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->medicine_name }}</td>
							<td>{{ $row->medicine_mg }}</td>					
							<td>{{ $row->description }}</td>
							<td>
	<a href="{{URL::to('medicine/edit/'.$row->id)}}">
	<button class="btn btn-success btn-outline">Edit</button>
	</a>
	<a onclick="confirm('{{URL::to('medicine/delete/'.$row->id)}}')" >
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
				</div>
				<!-- /Row -->
@endsection