@extends('layouts.app')

@section('panel-heading')
	Tags
@endsection
@section('content')

	@if (count($tags) > 0)
	@foreach($tags as $tag)
		<div class="well">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<h3><a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a></h3>
					@if ($tag->created_at)
					<small>Written {{ $tag->created_at->diffForHumans() }} By {{ $tag->admin->username }} </small>
					@elseif($tag->admin != null)
					<small>Written By {{  $tag->admin->username }} </small>
					@endif
				</div>
			</div>
		</div>

	@endforeach
	@else
		<div class="jumbtron">
	 		 There is no Tags to show 
		</div>
	@endif

@endsection

