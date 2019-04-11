 @extends('layouts.app')

@section('panel-heading')    
  	@if (\Route::currentRouteName() == 'myProfile')  
        <p class="text-center"><img src="/profile_pictures/{{ $user->profile_picture ?? 'default.png' }}" style="max-width: 50px; height: 50px; object-fit: cover; border-radius: 50% "> {{ $user->first_name . ' ' . $user->last_name}} - Update Profile Form</p>
   	@elseif (\Route::currentRouteName() == 'profile')  
        <p class="text-center"><img src="/profile_pictures/{{ $user->profile_picture ?? 'default.png' }}" style="max-width: 50px;height: 50px;object-fit: cover;border-radius: 50% "> {{ $user->first_name . ' ' . $user->last_name. '\'s ' }} Profile</p>
    @endif    
@endsection

@section('content')

@if (Sentinel::getUser()->id === $user->id)
    <form action="{{ route('profile')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
                <label for="Email"> Email </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" required placeholder="example@example.com" name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-group">
                        <label for="username"> Username </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Ex : User_name" name="username" value="{{ $user->username }}" required>
            </div>

        <div class="form-group">
                        <label for="first_name"> First Name </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="John" name="first_name" value="{{ $user->first_name }}" required>
            </div>
        </div>
        <div class="form-group">
        <label for="last_name"> Last Name </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Doe" name="last_name" value="{{$user->last_name }}" required>
            </div>
        </div>

        <div class="form-group">
        <label for="Location"> Location </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="United States" name="location" value="{{ $user->location }}" required>
            </div>
        </div>
       
      
        <div class="form-group">
        <label for="dob"> Date Of Birth </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                <input type="date" class="form-control" name="dob" required value="{{ $user->dob }}">

            </div>
        </div>

        <div class="form-group">
        <label for="Update_Profile"> Update Profile picture </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-upload fa-lg"></i></span>
                <input type="file" class="btn btn-default form-control" name="profile_picture"  >
            </div>
        </div>

         <div class="form-group">
        <label for="Password"> Type Your Password To Verify it's you </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
        </div>
        
       
      
     


        <div class="form-group">
            
                <button type="submit" class="btn btn-success form-control">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    Update Profile
                </button>
                   

            
        </div>

    </form>

@else
 	<form>
        {{csrf_field()}}
        <div class="form-group">
                <label for="Email"> Email </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input READONLY/ type="email" class="form-control" required placeholder="example@example.com" name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-group">
                        <label for="username"> Username </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input READONLY/ type="text" class="form-control" placeholder="Ex : User_name" name="username" value="{{ $user->username }}" required>
            </div>

        <div class="form-group">
                        <label for="first_name"> First Name </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input READONLY/ type="text" class="form-control" placeholder="John" name="first_name" value="{{ $user->first_name }}" required>
            </div>
        </div>
        <div class="form-group">
        <label for="last_name"> Last Name </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input READONLY/ type="text" class="form-control" placeholder="Doe" name="last_name" value="{{$user->last_name }}" required>
            </div>
        </div>

        <div class="form-group">
        <label for="Location"> Location </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <input READONLY/ type="text" class="form-control" placeholder="United States" name="location" value="{{ $user->location }}" required>
            </div>
        </div>
       
      
        <div class="form-group">
        <label for="dob"> Date Of Birth </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                <input READONLY/ type="date" class="form-control" name="dob" required value="{{ $user->dob }}">

            </div>
        </div>


    </form>

@endif
    

@endsection