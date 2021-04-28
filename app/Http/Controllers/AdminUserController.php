<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
// usercontroller, meant to be used by administrators


    //user index
    public function index()
    {
       $users = User::paginate(200);
       return view('admin.user.index', compact('users'));
    }
    
    public function show(User $user)
    {
        //
    }

    //edit user
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
         $user->update([
            'name' => $request->post('name'),
            'role' => $request->post('role'),
        ]);

        return redirect(route('user.index'));
    }

    //delete user
    public function destroy(User $user)
    {
    
        $user->delete();
        return redirect(route('user.index'));
    
    }

}
