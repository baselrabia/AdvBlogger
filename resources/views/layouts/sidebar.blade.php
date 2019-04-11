<div class="col-6 col-md-3 sidebar-offcanvas">
	@if (isset($archives))
		<ul class="list-group">
			<li class="list-group-item"><b>Archives</b></li>
			@foreach ($archives as $stats)
				<li class="list-group-item"><a href="{{ route('archives',['month' => $stats['month'],'year' => $stats['year']]) }}"> {{ $stats['month'] . ' ' . $stats['year'] }}</a></li>
			@endforeach
		</ul>
	@endif
	
	@if (isset($tags))
		<ul class="list-group">
				<li class="list-group-item"><b>Popular Tags</b></li>
				@foreach ($tags as $tag)
					<li class="list-group-item"><a href="{{ route('tags.show',$tag->name) }}"> {{ $tag->name }}</a></li>
				@endforeach
		</ul>
	@endif


	@if (isset($online_users))
			<ul class="list-group">
				<li class="list-group-item"><b>Online Users</b></li>
				@foreach ($online_users as $user)
					<li class="list-group-item"><a href="/profile/{{$user->username}}">
						<span><img src="/profile_pictures/{{ $user->profile_picture }}" class="img-circle avatar" alt="User Profile Image" style="    height: 30px;object-fit: cover; max-width: 30px; margin-right: 2px"></span>
						 {{ $user->first_name . ' ' . $user->last_name }}</a>
						<div class="pull-right">
							<span ><i class="fa fa-circle" style="color:lightgreen"></i></span>
						</div>

					</li>
				@endforeach
			</ul>
		@endif

		
	
	@if (Sentinel::getUser()->hasAccess('admin.*'))
		@if (isset($adminTags))
			<ul class="list-group">
				<li class="list-group-item"><b>Your Own Tags</b></li>
					@foreach ($adminTags as $tag)
						<li class="list-group-item"><a href="{{ route('tags.show',$tag->name) }}"> {{ $tag->name }}</a></li>
					@endforeach
			</ul>
		@endif
		
		
	
	@endif

</div>