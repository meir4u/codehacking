<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostsCreateRequest;
use App\Post;
use App\User;
use App\Category;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('name','id')->all();
        //$categories = Category::pluck('name','id')all();
      return view('admin.posts.create',compact('users'/*,'categories'*/));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $user = Auth::user();
        //$user = User::find($request->user_id);
        $input = $request->all();

        $input['category_id'] = 1;

        if($file = $request->file("photo_id")){
          //create file name
          $name = time() . $file->getClientOriginalName();
          //move file to image folder
          $file->move('images',$name);

          $photo = Photo::create(['file'=>$name]);

          $input['photo_id'] = $photo->id;
        }
       Post::create($input);
        //$user->posts->create($input);

       return redirect('/admin/posts');
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
        return view('admin.posts.edit');
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
        //
        //find user
        $post = Post::findOrFail($id);
        //delete images
        unlink(public_path() . $post->photo->file);
        //delete user
        $post->delete();
        Session::flash('delete','The post has been deleted');
        return redirect('/admin/posts');
    }
}
