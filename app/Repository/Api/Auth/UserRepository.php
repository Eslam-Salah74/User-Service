<?php
namespace App\Repository\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Trait\Api\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class UserRepository implements UserRepositoryInterface
{
    use ApiResponseTrait;

    public function register($request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $token = $user->createToken('API Token')->accessToken;
            return $this->apiResponse(['user' => $user, 'token' => $token],201,'User Stored');
        }

        return $this->apiResponse(null, 400, 'Sorry, User Not Stored');
    }

    // public function login($request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         $token = $user->createToken('API Token')->accessToken;

    //         return $this->apiResponse(
    //             ['user' => $user, 'token' => $token],200  ,'Login successful');
    //     }

    //     return $this->apiResponse(null, 401 ,'Invalid credentials');
    // }


    // Return One User
    public function show($request)
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

    public function update($request)
    {
        $userupdat = User::find($request->id);

        if (!$userupdat) {
            return $this->apiResponse(null, 404,'Sorry This Id Not Found' );
        }

        $userupdat->update([
            'name'  => $request->name ?? $userupdat->name,
            'email' => $request->email ?? $userupdat->email,
            'password' => $request->password ? Hash::make($request->password) : $userupdat->password,
        ]);

        return $this->apiResponse($userupdat, 200, 'User Updated Successfully');
    }


}
