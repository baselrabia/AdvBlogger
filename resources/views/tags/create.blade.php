@extends('layouts.app')

@section('panel-heading')
	Create A Tag
@endsection
@section('content')

	<form action="{{ route('tags.store') }}" method="POST" >
		{{ csrf_field() }}
		<div class="form-group">

			<label for="name"> Name </label>
			<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" >
		</div>
		
		<div class="form-group">
			<input type="submit" name="submit"  class="form-control btn btn-primary" value="Release Post" >
		</div>

	</form>		

@endsection
