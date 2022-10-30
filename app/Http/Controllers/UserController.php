<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $title = 'All Users';
        $users = User::paginate(12);
        return view('pages.users.index',compact('users','title'));
    }

    public function create()
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $title = 'New User';
        return view('pages.users.create',compact('title'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users,email|max:255|email',
            'mobile' => 'required|unique:users,mobile|numeric',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->save();

        return back()->with('success','User created successfully');
    }

    public function edit(User $user)
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $title = 'Update User ('.$user->name.')';
        return view('pages.users.edit',compact('title','user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $validates = [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => 'required|numeric|unique:users,mobile,'.$user->id,
        ];
        if ($request->password != null) {
            $validates['password'] = 'required|min:8|confirmed';
        }

        $request->validate($validates);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->type = $request->type;
        $user->save();

        return back()->with('success','User updated successfully');
    }

    public function delete(User $user)
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $user->delete();
        return back()->with('success','User deleted successfully');
    }

}
