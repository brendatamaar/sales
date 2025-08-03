<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Stores;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function register()
    {
        return view('pages.user-pages.register', [
            'roles' => Role::pluck('name')->all(),
        ]);
    }

    public function createUser(Request $request)
    {
        $input = $request->all();

        $user = User::create($input);
        $user->assignRole($request->roles);

        return redirect()->route('login');
    }

}
