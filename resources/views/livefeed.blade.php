@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('livefeed.store') }}">
			{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-3">
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
			    		<div class="panel-heading">
					      <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					        Select desired year....</a>
					      </h4>
			    		</div>
				    	<div id="collapse1" class="panel-collapse collapse in">
					     	<div class="panel-body">
								<div class="row">
									<div class="col-md-3 col-sm-3">
									</div>
									<div class="col-md-6 col-sm-6">							 
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2009">2009</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2010">2010</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2011">2011</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2012">2012</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2013">2013</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2014">2014</label>
										</div>										
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2015">2015</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2016">2016</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2017">2017</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2018">2018</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="selectedyear" value="2019" checked="checked">2019</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" name="selectedyear" value="2020" disabled>2020</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" name="selectedyear" value="2021" disabled>2021</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" name="selectedyear" value="2022" disabled>2022</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" name="selectedyear" value="2023" disabled>2023</label>
										</div>
									<!-- <div class="col-md-3 col-sm-3">
									</div> -->
								</div>  <!-- end of row -->										
							</div> <!-- end of panel-body -->
					  	</div>  <!-- end of collaspe -->
			  		</div> <!-- end of default panel -->
			  	</div> <!-- end of accordion -->
			<div class="col-md-3 col-sm-3">
			</div>
		</div> <!-- end of row -->


		<!-- <div class="row">
			<div class="col-md-3 col-sm-3">
			</div>
			<div class="col-md-6 col-sm-6"> -->
				<div class="panel-group" id="accordion2">
					<div class="panel panel-default">
						<div class="panel-heading">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
							Select desired week....</a>
						</h4>
						</div>
						<div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3 col-sm-3">	
									</div>						
									<div class="col-md-6 col-sm-6">			      	
										<div class="radio disabled">
											<label><input type="radio" value="-1" name="selectedweek"><b>PreSeason</b></label>
										</div>

										<p>&nbsp;</p>	
										<div class="radio">
											<label><input type="radio" value="1" name="selectedweek" checked="checked"><b>Regular Season</b></label>
										</div>
										<p>&nbsp;</p>
										<p><b>Playoffs</b></p>	
										<div class="radio disabled">
											<label><input type="radio" value="18" name="selectedweek">Wild Card</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" value="19" name="selectedweek">Division</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" value="20" name="selectedweek">Conference</label>
										</div>
										<div class="radio disabled">
											<label><input type="radio" value="22" name="selectedweed">Super Bowl</label>    
										</div>
									</div>
									<div class="col-md-3 col-sm-3">	
									</div>
								</div>  <!-- end of row -->	
							</div>  <!-- end of panel body -->
						</div> <!-- end of collaspe -->
					</div> <!-- end of default panel -->
				</div> <!-- end of accordion2 -->
			<div class="col-md-3 col-sm-3">
			</div>
		</div> <!-- end of row -->
	</div>  <!-- end of container -->

	<div class="row">
		<div class="col-md-4 col-sm-4">
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Submit</button>
			</div>
		</div>
		<div class="col-md-4 col-sm-4">
		</div>
	</div>  <!-- end of row -->


</form>
@endsection