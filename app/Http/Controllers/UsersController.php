<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function index()
    {
        return view('users');
    }

    public function store(Request $request)
    {
        $validate_rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        );

        $validator = Validator::make($request->all(), $validate_rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoUniqueName = md5(uniqid(rand(), true)) . '_' . $photo->getClientOriginalName();
                $photo->move('images', $photoUniqueName);
                $user->photo = $photoUniqueName;
            }

            if ($user->save()) {
                return response()->json(['success' => true, 'message' => 'The user created successfully']);
            }
        } catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        // todo this part didn't implement yet
    }


    public function all()
    {
        return response()->json(['users' => User::get()]);
    }

    public function destroy($id)
    {
        if (User::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'The user deleted']);
        }

        return response()->json(['success' => false, 'message' => 'something went wrong']);

    }
}
