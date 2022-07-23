<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfilesController extends Controller
{
    //
    public function index(  User $user)
    {
        $follows =(auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        //dd($follows);

        //dd($follows);

          // $user = User::findOrFail($user);//one row in database means one user (User.php)
            //findOrFail : used to handle if a non valid $user was inserted like not in database
       /* if (!$user) {
            abort(404);//throw a 404 error page
        }*/




            return view('profiles.index', compact('user', 'follows'));







    }


    public function edit(\App\User $user){
        $this->authorize('update', $user->profile);



        return view ('profiles.edit', compact('user'));

    }

    public function update(Request $request , User $user){

        $this->authorize('update', $user->profile);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'url' => '',

            'image' => '',
        ]);

       // dd(request()->all());

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            auth()->user()->profile->update(array_merge(
                request()->all(),
                ['image'=> $imagePath]
            ));
        }
        else
        {
            auth()->user()->profile->update(request()->all());

        }



        return redirect ("/profile/{$user->id}");
    }
}
