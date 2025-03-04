<?php 
namespace App\Repository\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\ApiResponseTrait;


class UserRepository implements UserRepositoryInterface
{
    use ApiResponseTrait;

    public function register(Request $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $token = $user->createToken('API Token')->accessToken;

            return $this->apiResponse(
                ['user' => $user, 'token' => $token],
                201,
                'User Stored'
            );
        }

        return $this->apiResponse(null, 400, 'Sorry, User Not Stored');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->accessToken;

            return $this->apiResponse(
                ['user' => $user, 'token' => $token],
                'Login successful',
                200
            );
        }

        return $this->apiResponse(null, 'Invalid credentials', 401);
    }
}
