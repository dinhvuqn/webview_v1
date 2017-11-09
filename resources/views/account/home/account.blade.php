@extends('account.templates.layout')
@section('title', 'Tài khoản')

@section('content')
<div id="wrapper">
		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="hpanel hblue">
						<div class="panel-heading hbuilt">Change password</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Old</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="old-pass" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">New</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="new-pass" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Confirm</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="confirm-pass" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Password 2</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="password-2-a" />
									</div>
								</div>
															</form>
						</div>
					</div>
				</div>

				<div class="col-md-4">      
					<div class="hpanel hblue">
						<div class="panel-heading hbuilt">Change info</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Fullname</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="new-name" value="1DG.ME" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Phone</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="new-phone" value="123123123" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Email</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="new-email" value="1dg.me@gmail.com" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Password 2</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="password-2-b" />
									</div>
								</div>
															</form>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="hpanel hred">
						<div class="panel-heading hbuilt">Change password 2</div>
						 <div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Old</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="old-pass-2" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">New</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="new-pass-2" />
									</div>
								</div>
								<div class="form-group has-primary">
									<label for="inputStandard" class="col-md-4 control-label">Confirm</label>
									<div class="col-md-8">
										<input type="text" class="form-control text-center" id="confirm-pass-2" />
									</div>
								</div>
															</form>
						</div>
					</div>
				</div>
			</div>
						</div>
		</div>
	</div>
@stop