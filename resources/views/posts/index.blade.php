@extends('layouts.app')

@section('content')

<div class="container">
        @foreach($posts as $post)
        <div class="row" >
            <div class="col-lg-6 col-lg-offset-3" >
                <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->image}}" alt="" style="width: 100%"></a>
            </div>
        </div>
    <div class="row">

            <div class="col-lg-6 col-lg-offset-3" style="padding-top: 1mm;padding-bottom: 3mm">
                <div>



                    <p><span style="font-weight: bold"> <a href="/profile/{{$post->user->id}}"><span style="text-decoration: black">{{$post->user->username}}</span></a> </span> {{$post->caption}}</p>
                </div>

            </div>
        </div>

    @endforeach
    <div class="row">
        <div class="col-lg-12" style="display: flex;justify-content: center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
