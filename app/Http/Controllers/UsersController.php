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
            'user_id' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_id' => $request->input('user_id'),
            'password' => Hash::make($request->input('password')),
            'role' => 'STAFF',
        ]);
    }

    public function createStudent() {
        return view('complaints.new-student');
    }

    public function postStudent(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'user_id' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_id' => $request->input('user_id'),
            'password' => Hash::make($request->input('password')),
            'role' => 'STUDENT',
        ]);
    }
}
