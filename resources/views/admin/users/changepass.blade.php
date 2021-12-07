@extends('admin.admin_base')

@section('main_content')

<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Change Paasword</h2>
	</div>
	<div class="card-body">
		<form method="POST" action="{{ route('user.update.password') }}">
			@csrf 
			@method('post')

			<div class="form-group">
				<label for="exampleFormControlInput1">Current Password:</label>
				<input type="password" name="current_password" class="form-control" id="current_password" placeholder="Tap your current password...">

				@error('current_password')

					<div class="text-danger">{{ $message }}</div>

				@enderror
			</div>
			

			<div class="form-group">
				<label for="exampleFormControlInput1">New Password:</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Tap the new password...">
				@error('password')

					<div class="text-danger">{{ $message }}</div>
					
				@enderror
				<span class="mt-2 d-block">It will be visible on the slider section.</span>
			</div>
			

			<div class="form-group">
				<label for="exampleFormControlInput1">Confirm new Password:</label>
				<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm the new password..">

				@error('password_confirmation')

					<div class="text-danger">{{ $message }}</div>
					
				@enderror
				<span class="mt-2 d-block">It will be visible on the slider section.</span>
			</div>
			
			
		
			<div class="form-footer pt-4 pt-5 mt-4 border-top">
				<button type="submit" class="btn btn-primary btn-default">Submit</button>
				
			</div>
		</form>
	</div>
</div>



@stop