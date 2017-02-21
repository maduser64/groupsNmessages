@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @if($userIsInGroup)
                <form role="form" method="POST" action="/group/{{$group->id}}/leave">
                {{ csrf_field() }}
                    <div class="panel-heading">{{ $group->name }}
                        
                            <button type="submit" class="btn btn-link">
                                Leave Group
                            </button>
                    </div>
                </form>
            @else
                <form role="form" method="POST" action="/group/{{$group->id}}/join">
                {{ csrf_field() }}
                    <div class="panel-heading">{{ $group->name }}
                        
                            <button type="submit" class="btn btn-link">
                                Join Group
                            </button>
                    </div>
                </form>
            @endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/group/{{ $group->id }}/post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 control-label">New Post</label>

                            <div class="col-md-6">
                                <input id="post_content" class="form-control" name="post_content" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <tbody>
                        @foreach ($group->posts as $post)
                            <tr>
                                <td><p>{{ $post->content }}</p></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
