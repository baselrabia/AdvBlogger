@extends('layouts.app')

@section('panel-heading')
	Tag
@endsection
@section('content')

	@if ($tag)
		<div class="well jumbtron">
			
				
				<h1><a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a></h1>
				
				
				
					@if ($tag->created_at)
						<small>Written {{ $tag->created_at->diffForHumans() }} By {{ $tag->admin->username }} </small>
					@else
						<small>Written By {{ $tag->admin->username }} </small>
					@endif
				
				@if (Sentinel::getUser()->hasAnyAccess(['admin.*','moderator.*']))
				
				<div >
					<a href="/tags/{{ $tag->name }}/edit" class="form-control text-center btn-default">Edit Tag</a>
				</div>
				<br>


				@if(Sentinel::getUser()->hasAccess('admin.delete'))
				<form action="{{ route('tags.destroy',$tag->name) }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<input type="submit" name="submit" class="form-control btn-danger" value="Delete Tag">
					
				</form>

				
				@endif
				@endif
					
		</div>
		<h3 > Posts Of Tag </h3>


			@if (count($tag->posts) > 0)
			@foreach($tag->posts as $post)
				<div class="well">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<img src="{{asset("images/$post->imagePath") ?? asset("images/default.jpg") }}" style="width:50%;border-radis:50%"  alt="image">
						</div>
						<div class="col-md-8 col-sm-8">
							<h3><a href="/posts/{{ $post->title }}">{{ $post->title }}</a></h3>
							<small>Written {{ $post->created_at->diffForHumans() }} By {{ $post->admin->username }} </small>
						</div>
					</div>
				</div>

			@endforeach
			@else
				<div class="jumbtron">
			 		 There is no Tags to show 
				</div>
			@endif


	@else
		<div class="jumbtron">
	 		 There is no Tag to show 
		</div>
	@endif




@endsection
