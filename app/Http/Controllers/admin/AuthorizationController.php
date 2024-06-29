<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
class AuthorizationController extends Controller
{

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            return redirect()->intended('/dashboard'); 
        } 
        else{ 
            return redirect()->to('/')->withErrors(trans('auth.failed'));
        } 
    }
    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
