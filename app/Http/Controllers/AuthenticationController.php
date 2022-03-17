<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // Login basic
    public function login_basic()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }

    // Login Cover
    public function login_cover()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-login-cover', ['pageConfigs' => $pageConfigs]);
    }

    // Register basic
    public function register_basic()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-register-basic', ['pageConfigs' => $pageConfigs]);
    }

    // Register cover
    public function register_cover()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-register-cover', ['pageConfigs' => $pageConfigs]);
    }

    // Forgot Password basic
    public function forgot_password_basic()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-forgot-password-basic', ['pageConfigs' => $pageConfigs]);
    }

    // Reset Password cover
    public function reset_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/reset-password', ['pageConfigs' => $pageConfigs]);
    }

    // email verify basic
    public function verify_email_basic()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-verify-email-basic', ['pageConfigs' => $pageConfigs]);
    }

    // email verify cover
    public function verify_email()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-verify-email', ['pageConfigs' => $pageConfigs]);
    }

    // two steps cover
    public function two_steps()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/auth/auth-two-steps', ['pageConfigs' => $pageConfigs]);
    }

    // register multi steps
    public function register()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/auth/auth-register', ['pageConfigs' => $pageConfigs]);
    }

    // Forgot Password
    public function forgot_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-forgot-password', ['pageConfigs' => $pageConfigs]);
    }
}
