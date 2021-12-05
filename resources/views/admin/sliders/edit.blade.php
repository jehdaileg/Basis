@extends('admin.admin_base')

@section('main_content')

<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Edit Slider</h2>
	</div>
	<div class="card-body">
		<form method="POST" action="{{ url('/slider/update/' .$slider->id) }}" enctype="multipart/form-data">
			@csrf 
			@method('put')

			<input type="hidden" name="old_image" value="{{ $slider->image }}">

			<div class="form-group">
				<label for="exampleFormControlInput1">Title</label>
				<input type="text" name="title" value="{{ $slider->title }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter title...">
				<span class="mt-2 d-block">It will be visible on the slider section.</span>
			</div>
			
			
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Description</label>
				<textarea class="form-control" name="description" value="{{ $slider->description }}" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>

			<div class="form-group">
				<label for="exampleFormControlFile1">Choose slider image</label>
				<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			</div>

			<div class="form-footer pt-4 pt-5 mt-4 border-top">
				<button type="submit" class="btn btn-primary btn-default">Submit</button>
				
			</div>
		</form>
	</div>
</div>



@stop