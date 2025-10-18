<?php

namespace App\Http\Controllers\Admin;

use App\Mail\InstructorRequestApproveMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\InstructorRequestRejectMail;
use Illuminate\Support\Facades\Mail;

class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingUsers = User::where('status', 'pending')->orWhere('status', 'rejected')->get();
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
        $validated = $request->validate([
            'status' => ['required', 'in:approved,rejected,pending'],
        ]);

        $instructor_request->status = $validated['status'];

        if ($validated['status'] === 'approved') {
            $instructor_request->role = 'instructor';
        }

        $instructor_request->save();

        self::sendNotification($instructor_request);

        return redirect()->back();
    }

    public function download(User $user)
    {
        return response()->download(public_path($user->attachment));
    }

    private static function sendNotification(User $instructor_request)
    {
        switch ($instructor_request->status) {
            case 'approved':
                if (env('MAIL_QUEUE_ENABLED', false)) {
                    // queue() 메소드는 메일을 전송하는 것이 아니라, '메일 전송 작업(work)'을 큐 저장소(예: 'jobs' 테이블)에 저장한다.
                    // 'php artisan queue:work' 커맨드를 사용해 '워커(worker) 프로세스'를 실행하여, 큐 저장소에 저장된 모든 작업을 순차적으로 실행한다.
                    Mail::to($instructor_request->email)->queue(new InstructorRequestApproveMail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestApproveMail());
                }
                break;
            case 'rejected':
                if (env('MAIL_QUEUE_ENABLED', false)) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestRejectMail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestRejectMail());
                }
                break;
        }
    }
}
