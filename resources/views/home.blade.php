@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Groups</div>

                <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                    @foreach ($myGroups as $group)
                        <tr>
                            <td><a href="/group/{{$group->id}}">{{ $group->name }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

                <div class="panel-heading">All Groups</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tbody>
                        @foreach ($allGroups as $group)
                            <tr>
                                <td><a href="/group/{{$group->id}}">{{ $group->name }}</a></td>
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