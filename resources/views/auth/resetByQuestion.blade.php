@extends('layouts.app')

@section('panel-heading')		
		<p class="text-center"> {{ Session::get('stage 2')  ?? Session::get('stage 3') ?? 'Reset Your Password' }}</p>
@endsection

@section('content')

	
	@if(session('stage 2'))
		
		<form action=" {{ route('reset.security2')}}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
        <label for="sec_question"> Security Question </label>
            <select class="form-control" name="sec_question">
              <option selected disabled>Pick Up A Question</option>
                <option value="who_is_your_favorite_doctor_or_teacher">Who is your favorite Doctor Or Teacher ?</option>
              <option value="where_are_you_from">Where Are you from?</option>
              <option value="what_is_your_hobby">What is your hobby?</option>
              <option value="what_is_your_favorite_car">What is your favorite car ?</option>
            </select>
        </div>
			<div class="form-group">
				<label for="sec_answer"> Answer Your Security Question </label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="text" class="form-control" placeholder="The Answer goes here" name="sec_answer">
			</div>
		</div>
			<div class="form-group">
			
				<button type="submit" class="btn btn-success form-control">
   					<i class="fa fa-spin fa-cog fa-lg"></i>
				<span class="sr-only"></span>
					Go To Step 3
				</button>
				<p class="text-center"><small><a href="{{ route('reset') }}">Reset By Email ?</a></small></p>        

		</div>

		</form>
		@elseif(session('stage 3'))
			<form action="{{ route('reset.security3')}}" method="POST">
				{{csrf_field()}}
			<div class="form-group">
					<label for="Password"> Password </label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" placeholder="Password" name="password">
				</div>
			</div>
			<div class="form-group">
				<label for="Password"> Password Confirmation </label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" placeholder="Password" name="password_confirmation">
				</div>
			</div>
			<div class="form-group">
			
				<button type="submit" class="btn btn-success form-control">
   					<i class="fa fa-spin fa-cog fa-lg"></i>
				<span class="sr-only"></span>
					Change Password
				</button>
		</div>
	</form>
		
		@else
		<form action="{{ route('reset.security1') }}" method="POST">
		{{csrf_field()}}
		<div class="form-group">
				<label for="Email"> Email </label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
				<input type="email" class="form-control" placeholder="example@example.com" name="email">
			</div>
		</div>
		<div class="form-group">
				<label for="dob"> Date of Birthday </label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-birthday-cake fa-lg" aria-hidden="true"></i>
				</span>
				<input type="date" class="form-control" name="dob">
			</div>
		</div>
		<div class="form-group">
				<label for="location">Location </label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
				</span>
				<input type="text" class="form-control" name="location" placeholder="Ex : United States">
			</div>
		</div>

		<div class="form-group">
			
				<button type="submit" class="btn btn-success form-control">
   					<i class="fa fa-spin fa-cog fa-lg" aria-hidden="true"></i>
   					Go To Step 2
					
				</button>
				<p class="text-center"><small><a href="{{ route('reset') }}">Reset By Email ?</a></small></p>        

		
		
		</div>
	</form>	
	
	@endif
	


@endsection