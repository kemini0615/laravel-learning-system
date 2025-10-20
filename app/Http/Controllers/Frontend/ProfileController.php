<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.student.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->about;
        $user->headline = $request->headline;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->back();
    }
}
