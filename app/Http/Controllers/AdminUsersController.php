<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;

use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        if(empty(trim($request->password))){
          $input = $request->except('password');
        }else{
          $input = $request->all();
          //incrypting password
          $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){
          //create file name
          $name = time() . $file->getClientOriginalName();
          //move file to image folder
          $file->move('images',$name);

          $photo = Photo::create(['file'=>$name]);

          $input['photo_id'] = $photo->id;
        }
        User::create($input);

        return redirect('/admin/users');
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if(empty(trim($request->password))){
          $input = $request->except('password');
        }else{
          $input = $request->all();
          $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){

          $name = time(). $file->getClientOriginalName();

          $file->move('images', $name);

          $photo = Photo::create(['file'=>$name]);

          $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find user
        $user = User::findOrFail($id);
        //delete images
        unlink(public_path() . $user->photo->file);
        //delete user
        $user->delete();
        Session::flash('delete','The user has been delited');
        return redirect('/admin/users');
    }
}
