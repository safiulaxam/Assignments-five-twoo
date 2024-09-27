<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'name.required'=> 'Name Cannot Be Empty',
            'email.required'=> 'Email Cannot Be Empty',
            'email.email'=> 'Email Must Be Valid',
            'password.required'=> 'Password Cannot Be Empty'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'admin'
        ]);
        session()->flash('success', 'User Created Successfully');
        return redirect()->route('register');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
