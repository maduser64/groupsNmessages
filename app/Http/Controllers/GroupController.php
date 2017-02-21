<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\User;

class GroupController extends Controller
{
    public function joinGroup(Request $request)
    {
        $group = Group::find($request->id);
        $group->users()->sync([$request->user()->id]);
        return redirect('/group/'.$group->id);
    }

    public function leaveGroup(Request $request)
    {
        $group = Group::find($request->id);
        $group->users()->detach([$request->user()->id]);
        return redirect('/group/'.$group->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createGroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newGroup = Group::create(['name' => $request->name]); // create the group
        $newGroup->users()->sync([$request->user()->id]); // add the creator to that group
        return redirect('/group/'.$newGroup->id); // redirect to the new group
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        $isInGroup = Auth::user()->isInGroup($group);
        
        return view('group', [
            'group' => $group,
            'userIsInGroup' => $isInGroup,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
