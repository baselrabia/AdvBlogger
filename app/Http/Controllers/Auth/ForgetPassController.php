<?php
namespace App\Http\Controllers\Auth;
use Sentinel;
use Activation;
use Reminder;
use App\User;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgetPassController extends Controller
{
     public function getForgetPass(){
        return view('auth.Forget-pass');

    }
    public function postForgetPass()
    {
        //validation
        request()->validate([
            'email' => new \App\Rules\usernameOrEmail,
        ]);
        $user = User::whereUsernameOrEmail(request('email'),request('email'))->first();
        

        $user = Sentinel::findById($user->id);
        if (Activation::completed($user)) {


            $reminder = Reminder::exists($user) ?: Reminder::create($user);

            $this->sendEmail($user,$reminder->code);

            return redirect()->route('login')->with('success','Reset code has been sent to your email');
        }else{
            return redirect()->route('login')->with('error','Activate your account first');

        }
    
    }


  public function sendEmail($user,$token)
    {
        Mail::send('emails.forgot-pass',['user'=>$user,'token'=>$token],function($message) use($user){
            $message->to($user->email);
            $message->subject("Reset Your Password");

        });

    }
}


