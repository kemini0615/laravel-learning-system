<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Password 파사드에서 broker() 메소드를 사용해서 패스워드 브로커를 지정할 수 있다.
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email'),
            //  콜백함수를 통해서 패스워드 리셋 이메일을 설정할 수 있다.
            function ($user, $token) {
                $notification = new ResetPassword($token);
                // 이메일에 존재하는 버튼의 URL을 설정한다.
                $notification->createUrlUsing(function () use ($user, $token) {
                    // 라우트 파라미터가 아닌 email은 쿼리스트링으로 URL에 추가된다.
                    return route('admin.password.reset', ['token' => $token, 'email' => $user->email]);
                });

                // 이메일을 보낸다.
                $user->notify($notification);
            }
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
