@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-right">
								<br>
									<a href="{{route('all.checkin')}}">
										<button class="btn btn-success btn-outline">
									All Check In List
									</button>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{ route('checkin.create') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="patient_name">Patient Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<select class="form-control" name="patient_name" required>
					<option>Select</option>
					@foreach($patients as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="room_name">Room</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<select class="form-control" name="room_name" required>
					<option>Select</option>
					@foreach($rooms as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="admit_date">Admit Date</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-calender"></i></div>
					<input type="datetime-local" class="form-control" name="admit_date" required="">
					</div>
				</div>

                <div class="form-group">
                    <label class="control-label mb-10" for="categories">Patient Type</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-layers"></i></div>
                        <select class="form-control" onchange="Corporate(this.value)" name="ptype" required>
                            <option value="0">Select</option>
                            <option value="Corporate">Corporate</option>
                            <option value="Private">Private</option>
                            <option value="President University">President University</option>
                        </select>
                    </div>
                </div>



				<div class="form-group" id="company_name" style="display: none;">
					<label class="control-label mb-10" for="company_name">Company Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-film"></i></div>
					<input type="text" class="form-control"  name="company_name" placeholder="Enter Company Name">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="categories">COVID-19 Categories</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-layers"></i></div>
					<select class="form-control" name="categories" required="">
					<option>Select</option>
	<option value="Asymptomatic (OTG)">Asymptomatic (OTG)</option>
	<option value="Mild Symptoms (Gejala Ringan)">Mild Symptoms (Gejala Ringan)</option>
	<option value="Probable (Suspek)">Probable (Suspek)</option>
					</select>
					</div>
				</div>

				<div class="form-group">
				<label class="control-label mb-10" for="swab_test_type">Swab Test Type</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-layers"></i></div>
					<select class="form-control" name="swab_test_type" required="">
					<option>Select</option>
	<option value="PCR">PCR</option>
	<option value="Antigen">Antigen</option>
					</select>
					</div>
				</div>

				<div class="form-group">
				<label class="control-label mb-10" for="swab_test_result">Swab Test Result</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-layers"></i></div>
					<select class="form-control" name="swab_test_result" required="">
					<option>Select</option>
	<option value="Positive">Positive</option>
	<option value="Reactive">Reactive</option>
	<option value="Negative">Negative</option>
	<option value="Non Reactive">Non Reactive</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="advance_payment">Advance Payment</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-credit-card"></i></div>
					<input type="text" class="form-control" name="advance_payment" placeholder="Enter Advance Payment Money" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="upload_swab_test_result">Upload Swab Test Result</label>
					<div class="input-group">
					<input type="file" name="test_file">
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

                    <script>

//window.onload=Corporate(0);

                        function Corporate(val)
                        {
                        	if(val==="Corporate")
                        	{
                        		$('#company_name').show();
                        	}
                        	else
                        	{
                        		$('#company_name').hide();
                        	}
                        }
                    </script>

@endsection
