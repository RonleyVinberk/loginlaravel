<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function doLogin(Request $request) {
		$messages = array(
			"required" => ":attribute tidak boleh kosong!",
			"min:3" => ":attribute tidak boleh kurang dari 3",
			"email" => ":attribute tidak valid. Silahkan coba kembali!"
		);
        // Validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // Make sure the email is an actual email
            'password' => 'required|min:3' // Password can only be alphanumeric and has to be greater than 3 characters
        );

        // Run the validation rules on inputs from the form
        $validator = Validator::make($request->only("email", "password"), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        } else {
            // Attempt to do the login
            if (Auth::attempt($request->only("email", "password"))) {
                return redirect('user');
            } else {
                return redirect('/')->with('notification_error_login', 'Login tidak berhasil. Silahkan mencoba kembali!');
            }
        }
    }
}
