<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingUsers = User::where('status', 'pending')
            ->orWhere('status', 'rejected')
            ->get();
        return view('admin.instructor-requests.index', compact('pendingUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instructor_request)
    {
        $request->validate(['status' => ['required', 'in:pending,approved,rejected']]);

        $instructor_request->status = $request->status;
        if ($request->status === 'approve') {
            $instructor_request->role = 'instructor';
        }
        $instructor_request->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(User $user)
    {
        return response()->download(public_path($user->attachment));
    }
}
