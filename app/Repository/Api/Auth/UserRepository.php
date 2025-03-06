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
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         $token = $user->createToken('API Token')->accessToken;

    //         return $this->apiResponse(
    //             ['user' => $user, 'token' => $token],
    //             'Login successful',
    //             200
    //         );
    //     }

    //     return $this->apiResponse(null, 'Invalid credentials', 401);
    // }


    // Return One User
    public function show(Request $request)
    {
        $user = User::find($request->id);

        if($user)
        {
            return $this->apiResponse($user ,200,'Ok');
        }
        else
        {
            return $this->apiResponse(null ,404,'Sorry This Id Not Found');
        }
    }

    public function update(Request $request)
    {
        $userupdat = User::find($request->id);

        if (!$userupdat) {
            return $this->apiResponse(null, 404, 'User Not Found');
        }

        $userupdat->update([
            'name'  => $request->name ?? $userupdat->name,
            'email' => $request->email ?? $userupdat->email,
            'password' => $request->password ? Hash::make($request->password) : $userupdat->password,
        ]);

        return $this->apiResponse($userupdat, 200, 'User Updated Successfully');
    }


}
