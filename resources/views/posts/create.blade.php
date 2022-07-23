@extends('layouts.app')

@section('content')
<div class="container">

<form action="/p" enctype="multipart/form-data" method="post">

    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Add a new post</h1>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                <label for="caption" class="col-md-4 control-label">Post Caption</label>


                <input id="caption" type="text" class="form-control" name="caption" value="{{ old('caption') }}"  autofocus>

                @if ($errors->has('caption'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
                @endif

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <label for="image" class="col-md-4 control-label" >Post Image</label>
        <input type="file" class="form-control" id="image" name="image">

        @if ($errors->has('image'))

                                        <strong>{{ $errors->first('image') }}</strong>

        @endif
    </div>
        <div class="row" >
            <div class="col-md-8 col-md-offset-9" style="padding-top:3mm;">

            <button class="btn btn-primary">Add Post</button>
            </div>
        </div>
    </div>

</form>


</div>
@endsection
