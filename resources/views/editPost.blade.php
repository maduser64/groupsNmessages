@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/group/{{$post->group->id}}/post/{{$post->id}}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <div class="col-md-6">
                                <input id="post_content" name="post_content" type="text" value="{{ $post->content }}" class="form-control" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
