<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function reset()
    {
        return view('auth.reset');
    }

    public function saveUser(Request $request)
    {
        $validator = $this->validateRegistration($request);

        if ($validator->fails()) {
            return $this->sendErrorResponse(400, $validator->getMessageBag());
        }

        $this->createUser($request);

        return $this->sendSuccessResponse(200, 'Register successful!');
    }

    public function loginUser(Request $request)
    {
        $validator = $this->validateLogin($request);

        if ($validator->fails()) {
            return $this->sendErrorResponse(400, $validator->getMessageBag());
        }

        $user = $this->getUserByEmail($request->email);

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('loggedInUser', $user->id);
            return $this->sendSuccessResponse(200, 'Login successful!');
        } else {
            return $this->sendErrorResponse(401, 'Email or password is incorrect');
        }
    }

    private function validateRegistration(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|max:50',
        ]);
    }

    private function validateLogin(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:50',
        ]);
    }

    private function createUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    private function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    private function sendErrorResponse($statusCode, $messages)
    {
        return response()->json([
            'status' => $statusCode,
            'messages' => $messages,
        ]);
    }

    private function sendSuccessResponse($statusCode, $message)
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
        ]);
    }
}
