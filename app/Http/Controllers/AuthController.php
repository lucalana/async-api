<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        return $this->success([
            'token' => $user->createToken(
                $user->email . '-token',
                ['*'],
                now()->addDays(2)
            )->plainTextToken,
            'user' => new UserResource($user),
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->unauthorized(['message' => 'Invalid credentials']);
        }
        $user = Auth::user();
        return $this->success([
            'message' => 'Authenticated',
            'token' => $user->createToken(
                $user->email . '-token',
                ['*'],
                now()->addDays(2)
            )->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success(statusCode: 204);
    }
}
