@extends('admin.admin_base')

@section('main_content')

<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Update Profile</h2>
	</div>
	<div class="card-body">
		<form method="POST" action="{{ route('update.profil') }}">
			@csrf 
			@method('post')

			<div class="form-group">
				<label for="exampleFormControlInput1">User name:</label>
				<input type="text" name="name" value="{{ $user->name }}" class="form-control" id="current_password" placeholder="Tap your current password...">

				@error('name')

					<div class="text-danger">{{ $message }}</div>

				@enderror
			</div>
			

			<div class="form-group">
				<label for="exampleFormControlInput1">New Password:</label>
				<input type="email" name="email" value="{{ $user->email }}" class="form-control" id="password" placeholder="Tap the new password...">
				@error('email')

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