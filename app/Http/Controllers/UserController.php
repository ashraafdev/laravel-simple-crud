<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('ensureenoughdataforadding')->only('store');
        $this->middleware('ensureenoughdataforupdating')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        return view('welcome', ['users' => User::all()]);
    }
    
    /**
     * Show the form for creating a new resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('newuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = new User();
        $newUser->firstName = $request->get('fName');
        $newUser->lastName = $request->get('lName');
        if (boolval($newUser->save()) == TRUE ) 
            return redirect('/users')->with(['isNewUserAdded' => TRUE]);
        return redirect('/users')->with(['isErrorOccured' => TRUE]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('updateuser', ['user' => $user]);
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
        $user->firstName = $request->get('newfName');
        $user->lastName = $request->get('newlName');
        if (boolval($user->save()) == TRUE)
            return redirect('/users')->with(['isUserUpdated' => TRUE]);
        return redirect('/users/' . $user->id . '/edit' )->with(['isErrorOccured' => TRUE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('isUserDeleted', TRUE);
    }
}
