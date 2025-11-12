<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\SnsUpdateRequest;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\ProfileUpdateRequest;

class ProfileController extends Controller
{
    use FileUpload;

    public function index(Request $request)
    {
        $user = Auth::user();
        return view('frontend.' . $user->role . '.profile');
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $path = $this->uploadFile($request->file('avatar'));
            $this->deleteFile($user->image);
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->about;
        $user->headline = $request->headline;
        $user->gender = $request->gender;
        $user->save();

        notyf()->success('Updated Successfully.');

        return redirect()->back();
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $user = Auth::user();
        $user->password = $request->password;
        $user->save();

        notyf()->success('Updated Successfully.');

        return redirect()->back();
    }

    public function updateSns(SnsUpdateRequest $request)
    {
        $user = Auth::user();
        $user->facebook = $request->facebook;
        $user->x = $request->x;
        $user->linkedin = $request->linkedin;
        $user->github = $request->github;
        $user->website = $request->website;
        $user->save();

        notyf()->success('Updated Successfully.');

        return redirect()->back();
    }
}
