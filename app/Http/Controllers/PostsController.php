<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\ImageManagerStatic as Image;


class PostsController extends Controller
{
        //middleware will stop to go to create post until being logged in
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(2);



        return view('posts.index', compact('posts'));
    }
    public function create(){
        return view ('posts.create');
    }

   public function store(Request $request){

        $this->validate($request, [
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads','public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
       $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200, 1200);

       $image->save();

       $cap = request('caption');
        /*$data=request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);*/


            auth()->user()->posts()->create([
                'caption' => $cap,
                'image' => $imagePath,

            ]);
           // \App\Post::create($data);
            //dd(request()->all());
       return redirect ('/profile/' . auth()->user()->id);
        }

        public function show (\App\Post $post ){

            //dd($post);

            $follows =(auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;


            return view ('posts.show', compact('post', 'follows'));


        }




}
