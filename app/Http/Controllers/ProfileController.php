<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProfilePicture;
use Illuminate\Support\Facades\Auth;
use App\User;
class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $profilePicture = ProfilePicture::where('user_id', $request->id)->first();
       $user = User::where('id', $request->id)->first();
       return view('profile', ['picture' => $profilePicture, 'user' => $user]);
    }
}
