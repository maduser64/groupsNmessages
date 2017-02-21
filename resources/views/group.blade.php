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
                    <table class="table table-bordered">
                        <tbody>
                        @foreach ($group->users as $user)
                            <tr>
                                <td><p>{{ $user->name }}</p></td>
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
