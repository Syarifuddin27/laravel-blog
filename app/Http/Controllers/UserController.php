<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Profile;
use App\Http\Controllers\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users', $users));
        // dd(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg'
        ]);

        flashy()->success('Succesfully to Add new User.');

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        if ($user->admin == 1) {
            $user->admin = 0;
        } else {
            $user->admin = 1;
        }

        $user->save();

        flashy()->success('Successfully changed user permission.');
        //return redirect()->back();
        return redirect('admin/users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id);
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        flashy()->success('Tag Deleted');
        return redirect()->back();
    }

    // public function makeUser()
    // {
    //     // $user = User::find($id);

    //     // $user->admin = 1;
    //     // $user->save();

    //     // flashy()->success('Successfully changed user permission.');
    //     // return redirect()->back();
    //     echo "user";

    // }
    
    // public function not_amin($id)
    // {
    //     $user = User::find($id);

    //     $user->admin = 0;
    //     $user->save();

    //     flashy()->success('Successfully changed user permission.');
    //     return redirect()->back();
    // }
}
