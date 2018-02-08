<?php

namespace App\Http\Controllers;

use App\UsersModel;
use Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $data["email"] = Auth::user()->email;
        $data["users"] = UsersModel::all()->where('usertype', '!=', 1);
        return view('user', $data);
    }

    public function doLogout() {
        Auth::logout();
        return redirect('/');
    }

    public function store(Request $request) {
        $password = $request->input('password_confirmation');
        $hashed = Hash::make($password);
        $data = array(
            "name" => $request->input('name'),
            "username" => $request->input('username'),
            "email" => $request->input('email'),
            "password" => $hashed,
            "usertype" => 2
        );

        UsersModel::create($data);
		    return redirect('user')->with('success_input', 'Data berhasil disimpan. Terima kasih.');
    }

    public function update($id, Request $request) {
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3|confirmed', // password can only be alphanumeric and has to be greater than 3 characters
            'password_confirmation' => 'required'
        );

        // run the validation rules on inputs from the form
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Error Validation
            $request->session()->flash('warning_ubah', 'Password tidak sama. Silahkan mencoba kembali. Terima kasih.');
            return redirect()->back();
        } else {
            try {
                $password = $request->input('password_confirmation');
                $hashed = Hash::make($password);
                $data = UsersModel::find($id);
                $input = array(
                    "name" => $request->input('name'),
                    "username" => $request->input('username'),
                    "email" => $request->input('email'),
                    "password" => $hashed
                );
                $data->fill($input)->save();
            } catch(Exception $e) {
                // Error try... catch...
            }

            $request->session()->flash('success_ubah', 'Data berhasil diganti. Terima kasih.');
            return redirect()->back();
        }
    }

    public function destroy($id) {
        try {
            $id = UsersModel::find($id);
            $id->delete();
        } catch(Exception $e) {
            // Error try... catch...
        }
        return redirect('user')->with('success_delete', 'Data berhasil dihapus. Terima kasih.');
    }

    public function edit($id) {
        $data["user"] = UsersModel::find($id);

		    return view('form', $data);
    }
}
