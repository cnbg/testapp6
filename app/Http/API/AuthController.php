<?php

namespace App\Http\API;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @throws Exception
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        if (!Hash::check($request->password, $user->password)) {
            throw new Exception(__('auth.failed'));
        }

        return $user->createToken('testapp6')->plainTextToken ?? '';
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}
