<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\TrustManagement;
use App\Models\User;
use App\Notifications\UserCreateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(config('constants.PER_PAGE'));
        return view('admin.usermanagement.user_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skip_roles = [config('constants.SUPER_ADMIN')];
        $roles = Role::whereNotIn('name', $skip_roles)->pluck('name', 'id');
        $trusts = TrustManagement::all()->pluck('name', 'id');
        return view('admin.usermanagement.create_user', compact('roles', 'trusts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = Str::random($length = 8);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($password),
            'trust_id' => $request->trust
        ]);

        $params = [];
        $params['user'] = $user->name;
        $params['email'] = $user->email;
        $params['password'] = $password;

        $user->assignRole($request->role);
        Mail::send(new \App\Mail\UserCreateNotification($params));


        if (!empty($user)) {
            toastr()->success('User added successfully');
            return redirect()->back();

        } else {
            toastr()->error('User not added successfully');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        $skip_roles = [config('constants.SUPER_ADMIN')];
        $roles = Role::whereNotIn('name', $skip_roles)->pluck('name', 'id');
        $trusts = TrustManagement::all()->pluck('name', 'id');
        return view('admin.usermanagement.create_user', compact('user','roles', 'trusts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'not_in:0'],
            'trust' => ['required', 'not_in:0'],
        ]);

        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->trust_id = $request->trust;

        if ($user->save()) {
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->role);

            toastr()->success('User successfully updated..!');
            return redirect()->route('usermanagement.index');
        } else {
            toastr()->error('User not update try again..!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findorFail($id);

        if ($users->delete()) {
            toastr()->success('User successfully deleted..!');
            return redirect()->route('usermanagement.index');
        } else {
            toastr()->error('User not delete try again..!');
            return redirect()->back();
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $params = [];
            $params['password'] = Hash::make($request->password);
            $user = User::findorFail(auth()->user()->id)->update($params);
            if ($user) {
                toastr()->success('Password changed successfully..!');
            } else {
                toastr()->error('Password not changed successfully..!');

            }
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
        }
        return redirect()->back();
    }
}
