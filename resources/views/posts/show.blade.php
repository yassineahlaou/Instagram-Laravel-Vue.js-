@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row" >
            <div class="col-lg-3" >
                <img src="/storage/{{$post->image}}" alt="" style="width: 100%">
            </div>

            <div class="col-lg-4">
                <div>
                    <div style="display: flex; align-items: center">

                            <img src="{{$post->user->profile->profileImage()}}" style="border-radius: 50%; width: 100%; max-width: 20%; padding-right: 3mm"  alt="">

                        <div style="font-weight: bold">
                            <a href="/profile/{{$post->user->id}}"><span style="text-decoration: black">{{$post->user->username}}</span></a>
                            <follow-link user-id="{{$post->user->id}}" follows="{{$follows}}"></follow-link>
                        </div>
                    </div>

                    <hr>

                    <p><span style="font-weight: bold"> <a href="/profile/{{$post->user->id}}"><span style="text-decoration: black">{{$post->user->username}}</span></a> </span> {{$post->caption}}</p>
                </div>

            </div>
        </div>

</div>
@endsection
