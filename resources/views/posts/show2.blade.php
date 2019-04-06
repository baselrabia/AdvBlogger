@extends('layouts.app')

@section('content')

	@if ($post)
		<div class="well jumbtron">
			
				<img src="{{asset("images/$post->imagePath") }}" style="width:50%;border-radis:50%"  alt="image">
				<hr>
				<h1><a href="/posts/{{ $post->title }}">{{ $post->title }}</a></h1>
				
				<div >
	 				  {{ $post->body }} 
				</div>
				<hr>
				<small>Written {{ $post->created_at->diffForHumans() }} By {{ $post->admin->username }} </small>
				
				@if (Sentinel::getUser()->hasAnyAccess(['admin.*','moderator.*']))
				@if (Sentinel::getUser()->hasAccess('admin.approve'))
					<form action="{{ route('posts.approve',$post->id) }}" method="POST">
						{{ csrf_field() }}
						<input type="submit" name="submit" class="form-control btn-primary" value="Approve Post">
						
					</form>
				@endif
				<br>
				
				<div >
					<a href="/posts/{{ $post->title }}/edit" class="form-control text-center btn-default">Edit Post</a>
				</div>
				<br>


				@if(Sentinel::getUser()->hasAccess('admin.delete'))
				<form action="{{ route('posts.destroy',$post->title) }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<input type="submit" name="submit" class="form-control btn-danger" value="Delete Post">
					
				</form>

				
				@endif
				@endif
				


			
		</div>


	@else
		<div class="jumbtron">
	 		 There is no post to show 
		</div>
	@endif

@endsection
