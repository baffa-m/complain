<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function createStaff() {
        return view('complaints.new-staff');
    }

    public function postStaff(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone_no' => 'required|numeric',
            'user_id' => 'required|numeric',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'user_id' => $request->input('user_id'),
            'password' => Hash::make($request->input('password')),
            'role' => 'STAFF',
        ]);

        return redirect()->route('complaints.index')->with('success', 'Staff registered successfully');
    }

    public function createStudent() {
        return view('complaints.new-student');
    }

    public function postStudent(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone_no' => 'required|numeric',
            'user_id' => 'required|numeric',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'user_id' => $request->input('user_id'),
            'password' => Hash::make($request->input('password')),
            'role' => 'STUDENT',
        ]);

        return redirect()->route('complaints.index')->with('success', 'Staff registered successfully');

    }
}
