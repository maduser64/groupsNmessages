<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;

class ReactionController extends Controller
{

    public function reactToPost($id, $reaction_type)
    {
        $this->handleLike($id, 'App\Models\Post', $reaction_type);
        return redirect()->back();
    }

    public function reactToComment($id, $reaction_type)
    {
        $this->handleLike($id, 'App\Models\Comment', $reaction_type);
        return redirect()->back();
    }

    public function reactToReply($id, $reaction_type)
    {
        $this->handleLike($id, 'App\Models\Reply', $reaction_type);
        return redirect()->back();
    }

    public function handleLike($id, $reactable_type, $reaction_type)
    {
        $existing_reaction = Reaction::withTrashed()->whereReactableType($reactable_type)->whereReactableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_reaction))
            Reaction::create([
                'user_id'       => Auth::id(),
                'reactable_id'   => $id,
                'reactable_type' => $reactable_type,
                'reaction_type' => $reaction_type,
            ]);
        else
        {
            if (is_null($existing_reaction->deleted_at)) $existing_reaction->delete();
            else $existing_reaction->restore();
        }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
