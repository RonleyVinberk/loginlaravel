<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $data["users"] = User::all()->where('usertype', '!=', 1);
        return view('user', $data);
    }

    public function doLogout() {
        Auth::logout();
        return redirect('/');
    }

	public function store(Request $request) {
	    $messages = [
	        'required' => ':attribute tidak boleh kosong!',
	        'min:3' => ':attribute tidak boleh kurang dari 3',
	        'email' => ':attribute tidak valid. Silahkan coba kembali!'
	    ];

	    $rules = [
	        'name' => 'required',
	        'username' => 'required',
	        'email' => 'required|email',
	        'password' => 'required|min:3'
	    ];

    	$inputData = $request->only('name', 'username', 'email', 'password');

    	// Lakukan validasi
    	$validator = Validator::make($inputData, $rules, $messages);

    	// Redirect jika gagal validasi
	    if ($validator->fails()) {
			return redirect('user')->withErrors($validator)->withInput();
	    }

	    $inputData['password'] = Hash::make($inputData['password']);
	    $inputData['usertype'] = 2;

	    if (!User::create($inputData)) {
	        return back()->with('notification_error_store', 'Data gagal disimpan. Silahkan mencoba kembali! Terima kasih.');
	    }

    	return redirect('user')->with('notification_success_store', 'Data berhasil disimpan. Terima kasih.');
	}

    public function update(Request $request, User $user) {
		$messages = [
			'required' => ':attribute tidak boleh kosong!',
	        'min:3' => ':attribute tidak boleh kurang dari 3',
	        'email' => ':attribute tidak valid. Silahkan coba kembali!'
		];

        $rules = [
			'name' => 'required',
			'username' => 'required',
			'email'    => 'required|email',
			'password' => 'min:3|confirmed'
		];

		$dataUpdate = $request->only("name", "username", "email", "password_confirmation");

        // Lakukan validasi
        $validator = Validator::make($dataUpdate, $rules, $messages);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$dataUpdate['password_confirmation'] = Hash::make($dataUpdate['password_confirmations']);
	    $dataUpdate['usertype'] = 2;

		if (!$user->update($dataUpdate)) {
			return back()->with('notification_error_update', 'Data gagal diganti. Silahkan mencoba kembali! Terima kasih.');
		}

		return redirect('user')->with('notification_success_update', 'Data berhasil diganti. Terima kasih.');
    }

    public function destroy(User $user) {
		if ($user->delete()) {
			return redirect('user')->with('notification_success_destroy', 'Data berhasil dihapus. Terima kasih.');
		}
        return redirect('user')->with('notification_success_destroy', 'Data berhasil dihapus. Terima kasih.');
    }

    public function edit(User $user) {
        $data["user"] = $user;

		return view('form', $data);
    }
}
