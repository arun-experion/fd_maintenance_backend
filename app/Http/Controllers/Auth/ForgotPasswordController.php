<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Redirect; 

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function sendResetLinkEmail(Request $request)
    {
        
        $user = User::where('email', $request->email)->whereHas('roles', function ($query) {
            $query->whereIn('role_id', ['2','1']);
        })->first();
        if(isset($user->id) && !empty($user->id)) {

            // We will send the password reset link to this user. Once we have attempted
            // to send the link, we will examine the response then see the message we
            // need to show to the user. Finally, we'll send out a proper response.
            $response = $this->broker()->sendResetLink(
                $request->only('email')
            );

            if ($response === Password::RESET_LINK_SENT) {
                return back()->with('status', trans($response));
            }

            // If an error was returned by the password broker, we will get this message
            // translated so we can notify a user of the problem. We'll redirect back
            // to where the users came from so they can attempt this process again.
            return back()->withErrors(
                ['email' => trans($response)]
            );
        }
        return Redirect::back()->with(['message' => 'Invalid Email', 'alert-type' => 'error']);
       
    }
}
