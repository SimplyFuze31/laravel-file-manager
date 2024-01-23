<?php declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class UserController extends Controller
{
    use HasRoles;

    public function index() 
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create() 
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request){

        $incomingdata = $request->validate([

            'name' => ['required','max:40'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role-select' => ['required']
        ]); 


        $user = User::create([
            'name' => $incomingdata['name'],
            'email' => $incomingdata['email'],
            'password' => bcrypt($incomingdata['password']),
        ]);
        $user->assignRole([$incomingdata['role-select']]);
        return redirect()->route('users.index')->with('success','Користувач успішно доданий');

    }
    public function destroy(User $user) 
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('Користувач видалений успішно'));
    }

}
