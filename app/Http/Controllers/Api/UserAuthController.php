<?php

namespace App\Http\Controllers\Api;

use Gate;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()
                ], Response::HTTP_FORBIDDEN);
        }

        $registerUserData = $validator->validated();

        $user = User::create([
            'name' => $registerUserData['name'],
            'email' => $registerUserData['email'],
            'password' => Hash::make($registerUserData['password']),
        ]);

        $token = $user->createToken($user->id . $user->name . '-AuthToken')->plainTextToken;

        return response()
            ->json([
                'message' => 'Register Successfully!',
                'access_token' => $token,
                'data' => new UserResource($user),
                'status' => Response::HTTP_CREATED
            ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()
                ], Response::HTTP_FORBIDDEN);
        }

        $loginUserData = $validator->validated();
        $user = User::where('email', $loginUserData['email'])->first();
        if (!$user || !Hash::check($loginUserData['password'], $user->password)) {
            return response()->json([
                'message' => 'Email or password wrong!!',
                'status' => Response::HTTP_UNAUTHORIZED,
            ], Response::HTTP_UNAUTHORIZED);
        }
        $token = $user->createToken($user->id . $user->name . '-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'data' => new UserResource($user),
            'status' => Response::HTTP_ACCEPTED
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "logged out successfully",
            "status" => Response::HTTP_OK
        ]);
    }

    public function index()
    {
        abort_if(Gate::denies('user_access', auth()->user()), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::with('roles')->get();
        return response()->json([
            'data' => UserResource::collection($users),
            'status' => Response::HTTP_OK,
        ]);
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'newPassword' => 'required|min:8',
            'prePassword' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()
                ], Response::HTTP_FORBIDDEN);
        }

        $requestData = $validator->validated();
        $user = auth()->user();
        if (Hash::check($requestData['prePassword'], $user->password)) {
            auth()->user()->update([
                'password' => Hash::make($requestData['newPassword']),
            ]);
            return response()
                ->json([
                    'message' => 'Change password successfully',
                    'status' => Response::HTTP_OK
                ], Response::HTTP_OK);
        } else {
            return response()
                ->json([
                    'errors' => [
                        'prePassword' => 'Pre password is wrong',
                    ],
                    'status' => 500
                ], 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            auth()->user()->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return response()
                ->json([
                    'message' => 'Profile updated successfully',
                    'user' => new UserResource(auth()->user()),
                    'status' => Response::HTTP_OK
                ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json([
                    'message' => 'Fail to update',
                    'status' => 500
                ], 500);
        }
    }

    public function  deleteAccount()
    {
        auth()->user()->delete();
        return response()
            ->json([
                'message' => 'Account deleted successfully',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
    }

    public function destory(User $user)
    {
        abort_if(Gate::denies('user_delete', auth()->user()), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->delete();
        return response()
            ->json([
                'message' => 'User deleted successfully',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
    }
}
