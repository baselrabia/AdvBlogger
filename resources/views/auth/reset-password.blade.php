@extends('layouts.app')
@section('panel-heading')
    <h4 class="text-center">Reset Your Password</h4>
@endsection
@section('content')
  <div class="col-md-8 col-md-offset-2">
    <form class="form-horizontal " method="POST" action="{{ route('reset-password') }}">
        {{ csrf_field() }}


        <div class="form-group">
        <label for="Password"> Password </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
        </div>
        <div class="form-group">
        <label for="password_confirmation"> Password Confirmation </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation" required>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit New Password
                </button>
               
        
            </div>
        </div>
    </form>
    </div>            
         
@endsection
