<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::find($request->user_id);

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();
        
        event(new PasswordReset($user));

        return Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', )
                    : back()->withInput($request->only('email'))
                            ;

    }

    public function updateEmail(Request $request)
    {

        $user = User::find($request->user);

        $user->forceFill([
            'email' => $request->email,
        ])->save();

        return redirect()->route('login');

    }

    public function updatePhoto(Request $request)
    {
        try {
            DB::beginTransaction();
            //sending to storage path
            $path_novo = $request->file( key:'profile_photo')->store( path: 'public/images/profile');
            $path_novo = str_replace("public/", "storage/", $path_novo);
            
            $user = User::find($request->user_photo);

            $path = str_replace("storage/images/profile/", "\\storage\\images\\profile\\", $user->profile_photo_path);
            $file_path = public_path() . $path;

            $user->forceFill([
                'profile_photo_path' => $path_novo,
            ])->save();

            DB::commit();
            unlink($file_path);
            return redirect()->back()->withInput();
        }catch (\Throwable $throwable){
            DB::rollBack();
            return redirect()->back()->withInput();
        }

    }
}
