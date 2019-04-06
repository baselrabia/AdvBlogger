@extends('layouts.app')

@section('panel-heading')
	Edit A Tag
@endsection
@section('content')

	<form action="{{ route('tags.update',$tag->name) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
			<div class="form-group">

			<label for="name"> Name </label>
			<input type="text" name="name" class="form-control" placeholder="Edit Tag Name" value="{{ $tag->name }}" >
		</div>
		
		<div class="form-group">
			<input type="submit" name="submit"  class="form-control btn btn-primary" value="Edit Post" >
		</div>

	</form>		

@endsection
