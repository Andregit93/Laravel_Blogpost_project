<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        Gate::authorize('superAdmin');
        return view('dashboard.user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('dashboard.user.edit', [
            'user' => $user,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate the request data
        // $request->validate([
        //     'role' => 'required|in:user,is_admin,is_superAdmin',
        // ]);
        // Update the user role based on the selected option
        switch ($request->role) {
            case 'user':
                $user->is_admin = 0;
                $user->is_superAdmin = 0;
                break;
            case 'secondAdmin':
                $user->is_admin = 1;
                $user->is_superAdmin = 0;
                break;
            case 'superAdmin':
                $user->is_admin = 0;
                $user->is_superAdmin = 1;
                break;
        }

        // Save the changes to the database
        $user->save();

        // Redirect to the previous page with a success message
        return redirect('/dashboard/user')->with('success', 'User role has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/user')->with('deleteSuccess', 'Account has been delete!');
    }
}
