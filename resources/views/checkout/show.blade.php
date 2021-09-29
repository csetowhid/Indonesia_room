@extends('master')
@section('content')
<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading text-center">
									
										
										
											<img src="{{URL::to($settings->company_logo)}}" style="width: 100%;">
										
					
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-6">
		
												<span class="capitalize-font" style="font-size: 16px; padding: 5px 0;">{{$settings->company_name}}</span>
												<address>
			<span class="address-head mb-5">{{$settings->address}}</span>
			
													<abbr>P : </abbr>
													{{$settings->mobile}}
													{{-- {{$patient->patient_mobile}} <br>
													{{$patient->patient_address}} <br> --}}
			
												</address>
											</div>
											<div class="col-xs-6 text-right">
												{{-- <span class="txt-dark head-font inline-block capitalize-font mb-5">Company Name:</span>
												<address class="mb-15">
													<span class="address-head mb-5">COVID-19 Isolation Facility</span>
													795 Folsom Ave, Suite 600 <br>
													San Francisco, CA 94107 <br>
													<abbr title="Phone">P:</abbr>(123) 456-7890
												</address> --}}
											</div>
										</div>
										
										<div class="row">
											<br>

											<h2 class="text-center">INVOICE</h2>
											<h6 class="text-center">Checkout ID # {{$checkouts->id}}</h6>
											<h6 class="text-center">Patient ID # {{$checkouts->patient_id}}</h6>


											<hr style="border-color: black;width: 95%;">
										</div>

 <div class="container-fluid" style="color: black">
 	 <div class="row">
 	<div class="col-md-6">
 		<div class="row">
 			<div class="col-md-3">
 				 		Patient Name : <br>
 				 		Patient Address : <br> 
 				 		Patient Mobile : <br> 

 			</div>
 			<div class="col-md-6">
 				{{$checkouts->patient_name}} <br> {{-- <hr style="border-color: black;"> --}}
 				{{$patient->patient_address}} <br>
 					{{$patient->patient_mobile}}
 				
 			</div>
 		</div>
 	</div>
 	<div class="col-md-6">
 		<div class="row">
 			<div class="col-md-3">
 				Invoice Date <br>
 				Note : 
 			</div>
 			<div class="col-md-6">
 				<?php echo date("Y-m-d") . "<br>"; ?>
 				{{$checkouts->note}}
 			</div>
 		</div>
 	</div>
 </div>
 
<div class="seprator-block"></div>
 <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		<table id="datable_1" class="table table-hover display" >
					<thead>
							<tr>
													<th>SL. No</th>
													<th>Description</th>
													<th>Amount</th>
							</tr>
					</thead>
					<tbody>		
					<?php $number = 0; ?>
						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							<td>Meal ( @foreach($meal_report as $row) 
								{{ $row->food_name }}
								@endforeach )
							</td>
							<td>IDR {{$meal_sum}}</td>
							
						</tr>

						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>

							<td>Medical Report ( @foreach($medical_report as $row) 
								{{ $row->date }}
								@endforeach )
							</td>
							<td>IDR {{$medical_report_sum}}</td>
						</tr>



						<tr>
							<td>{{ $number+1 }}</td>
							<?php $number++; ?>
							
							<td>Medicine Report ( @foreach($medicine_report as $row) 
								{{ $row->medicine_name }} {{ $row->medicine_mg }},
								@endforeach )
							</td>
							<td>IDR {{$medicine_report_sum}}</td>
						</tr>
						<tr>
							<td colspan="2">Total</td>
							<td style="font-weight: bold"> IDR <?php $total = $meal_sum+$medical_report_sum+$medicine_report_sum; echo $total; ?></td>
						</tr>
						<tr>
							<td colspan="2">Advance Payment</td>
							<td style="font-weight: bold;"> IDR {{$checkouts->advance_payment}}</td>
						</tr>


					{{-- 	<tr>
							<td colspan="2">Payment Due</td>
							<td style="font-weight: bold;"> IDR  <?php $due = $checkouts->advance_payment-$total; echo $due?> </td>
						</tr> --}}



					</tbody>
		</table>
										</div>
</div>
</div>
<div class="seprator-block"></div>
<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-3"></div>
	<div class="col-md-3">
		<span style="font-weight: bold; margin: 5px 0;">Signature Name </span><br> 
		{{$settings->signature_name}} <br>
		<img src="{{URL::to($settings->signature_image)}}" style="width:100px; height: 25px; margin: 5px 0;">
	</div>
</div>
<br><br>


				<div class="pull-right">
												<button type="button" class="btn btn-success btn-outline btn-icon left-icon" onclick="javascript:window.print();"> 
													<i class="fa fa-print"></i><span> Print</span> 
												</button>
				</div>
				
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
					<!-- /Row -->
					
@endsection

