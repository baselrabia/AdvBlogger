@extends('layouts.app')
@section('panel-heading')
    <h4 class="text-center">Login Form</h4>
@endsection
@section('content')

    <form class="form-horizontal " method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail | Username</label>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                <input id="password" type="password" style="font-size: 25px;" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
                <p class="text-center"><small><a href="{{ route('reset.security') }}"> Forgot Your Password ? </a></small></p>
        
            </div>
        </div>
    </form>
    <form>
        <div class="form-group row">
            <div class="text-center"> 
                <a href="{{ url('/login/google') }}" class="btn btn-primary" style="background-color:#cf4332;border-color:#cf4332; "><i class="fa fa-google-plus fa-lg" aria-hidden="true" style="padding:6px"></i>  Join Us With Google </a>
           
                 <a href="{{ url('/login/facebook') }}" class="btn btn-primary" style="background-color:#3b5998"><i class="fa fa-facebook-f fa-lg" aria-hidden="true" style="padding:6px"></i> Join Us With Facebook</a>
                 
            </div>
        </div>
    </form>
                
         
@endsection

