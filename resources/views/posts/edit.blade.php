@extends('layouts.app')

@section('content')

	<form action="{{ route('posts.update',$post->title) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">

			<label for="title"> Title </label>
			<input type="text" class="form-control" name="title" value= "{{ $post->title }}" placeholder="Post Title">
		</div>
		<div class="form-group">

			<label for="body"> Body </label>
			<textarea class="form-control" name="body"  placeholder="Post Body">{{ $post->body }}</textarea>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<img src="{{asset("images/$post->imagePath") }}" style="width:50%;border-radis:50%"  alt="image">
				</div>
			</div>
		</div>
		<div class="form-group">

			<label for="file"> Upload An Image </label>
			<input type="file"  name="imagePath" >
		</div>
		<div class="form-group">
			<input type="submit" name="submit"  class="form-control btn btn-primary" value="Edit Post" >
		</div>

	</form>		

@endsection
