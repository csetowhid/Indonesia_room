@extends('master')
@section('content')
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Admin / Staff List</h6>
								</div>
								<div class="pull-right">
									<a href="{{URL::to('user/register')}}">
										<button class="btn btn-success btn-outline">
									Add Admin / Staff
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
														<th>Name</th>
														<th>Email</th>
														<th>User Name</th>
														<th>User Type</th>
														<th>Image</th>
														<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>SL. No</th>	
														<th>Name</th>
														<th>Email</th>
														<th>User Name</th>
														<th>User Type</th>
														<th>Image</th>
														<th>Action</th>
													</tr>
												</tfoot>
				<tbody>
					<?php $number = 0; ?>
					@foreach($users as $row)
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>{{ $row->name }}</td>
							<td>{{ $row->email }}</td>
							<td>{{ $row->username }}</td>
							<td>{{ $row->usertype }}</td>					
							<td><img src="{{URL::to($row->image)}}" style="width:70px; height: 70px;"></td>	
							<td>
	{{-- <a href="{{URL::to('user/edit/'.$row->id)}}">
	<button class="btn btn-success btn-outline">Edit</button>
	</a> --}}
	<a onclick="confirm('{{URL::to('user/delete/'.$row->id)}}')" >
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