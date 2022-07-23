@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-lg-3">
            <img src="{{$user->profile->profileImage()}}" style="border-radius: 50%; width: 80%"  alt="">

        </div>

        <div class="col-lg-9">

            <div  style="display: flex;align-items: baseline;justify-content: space-between" >
                <div  style="display: flex; align-items: center; padding-bottom: 3mm">
            <div class="h4">{{$user->username}}</div>
                   <follow-button  user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>


                </div >


                @can('update', $user->profile)
                    <a href="/p/create" >Add new Post</a>
                @endcan

            </div>
    </div>

        <div class="col-lg-4">

            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit" >Edit Profile</a>
            @endcan


            <div style="display: flex;">
                <div style="padding-right: 5mm"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div style="padding-right: 5mm"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div style="padding-right: 5mm"><strong>{{$user->following->count()}}</strong> following</div>
            </div>

            <div class ="" style="padding-top: 3mm"> <strong>{{$user->profile->title}}</strong></div>
            <div class =""> {{$user->profile->description}}</div>
            <div class =""> <a href="#">{{$user->profile->url ?: 'N/A' }}</a></div>
            <!-- ?: returns the first non-NULL value -->
        </div>

    </div>
    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-lg-4" style="padding-bottom: 3mm;padding-top: 2mm">
                <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" alt="" style="width: 100%">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
