<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\User;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();

        $sorted = $regions->sortByDesc(function ($region, $key) {
            return count($region->users);
        });

        return view('users.index', ['regions' => $sorted]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User::getRoles();

        $regions = Region::pluck('name','id')->all();

        return view('users.create', compact('roles','regions'));
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
            'name' =>'required|string',
            'address' =>'required|string',
            'phone'   =>  'required|string|unique:user',
            'region' =>  'required|string'
        ]);

        $password = User::makeCustomPassword($request->get('phone'));

        $fields = $request->all();

        $fields['password'] = $password;

        $user = User::create($fields);

        return redirect()->route('users.show', $user->region);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);

        $users = $region->users->where('role', '!=', 'admin');

        return view('users.show', compact('region', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = User::getRoles();

        $regions = Region::pluck('name','id')->all();

        return view('users.edit', compact('user','roles','regions'));
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
        $this->validate($request, [
            'name' =>'required|string',
            'address' =>'required|string',
            'phone'   =>  ['required', Rule::unique('user')->ignore($id)],
            'region' =>  'required|string'
        ]);
        $fields = $request->all(['region', 'name', 'magazin', 'address','phone','phone_2','watsapp','status','role','social']);
        
        if($request->get('password') != null){
            $fields['password'] = User::makeCustomPassword($request->get('password'));
        }
        $user = User::find($id);

        $user->update($fields);

        return redirect()->route('users.show', $user->region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
