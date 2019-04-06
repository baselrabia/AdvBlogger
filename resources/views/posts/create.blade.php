@extends('layouts.app')

@section('panel-heading')
	Create A Post
@endsection
@section('content')

	<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">

			<label for="title"> Title </label>
			<input type="text" class="form-control" name="title" value= "{{ old('title') }}" placeholder="Post Title">
		</div>
		<div class="form-group">

			<label for="body"> Body </label>
			<textarea class="form-control" name="body"  placeholder="Post Body">{{ old('body') }}</textarea>
		</div>
		<div class="form-group">

			<label for="file"> Upload An Image </label>
			<input type="file"  name="imagePath" >
		</div>
		<div class="form-group">
			<label for="tags"> Tags </label>
			<input type="text" name="tags" class="form-control" placeholder="Post Tags" value="{{ old('tags') }}" >
		</div>
		<div class="form-group">
			<input type="submit" name="submit"  class="form-control btn btn-primary" value="Release Post" >
		</div>

	</form>		

@endsection
