<h1><strong>  Reset Your Password </strong></h1>

<h1>Hello {{$user->first_name}} {{$user->last_name}},</h1>

We are glad you are here, let's hope you enjoy the website 
in order to Reset Your Password 
click the button below .

<p>
	
	<button class="btn btn-primary"><a href="{{ env('APP_URL','http://localhost:8000'.'/reset/'.$user->email.'/'. $token)}}">Reset Your Password</a></button>

</p>

Thanks,
<br>
{{ config('app.name') }}