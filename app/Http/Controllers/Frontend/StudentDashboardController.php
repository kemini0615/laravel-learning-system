<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('frontend.student.dashboard');
    }

    public function becomeInstructor()
    {
        if (Auth::user()->role === 'instructor') {
            abort(404);
        }
        return view('frontend.student.become-instructor');
    }

    public function becomeInstructorUpdate(Request $request, User $user)
    {
        $request->validate(['attachment' => 'required|mimes:jpg,png,pdf,doc,docx|max:30000']);
        $filePath = $this->uploadFile($request->file('attachment'));

        $user->update([
            'status' => 'pending',
            'attachment' => $filePath,
        ]);

        return redirect()->route('student.dashboard');
    }
}
