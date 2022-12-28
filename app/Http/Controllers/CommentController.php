<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
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
        $this->authorize('create', Comment::class);
        $validated = $request -> validate(['text' => 'required|min:3|max:1000']);

        $c = Comment::create($validated);
        
        $c -> author() -> associate($request -> user()) -> save();
        $c -> item() -> associate(Item::find($request -> get('item_id'))) -> save();
        
        Session::flash('comment-changed', "komment beküldése");
        return redirect(url()->previous().'#'.$c->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        Session::flash('comment', $comment);
        return redirect(url()->previous().'#'.$comment->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $validated = Validator::make($request->all(), [
            'newtext' => 'required|min:3|max:1000'
        ]);
        if ($validated->fails()){
            Session::flash('comment-error', $validated->errors()->getMessages()['newtext'][0]);
            return redirect(url()->previous().'#'.$comment->id);
        }
        $valid = $validated->valid();
        $valid['text'] = $valid['newtext'];
        $comment->update($valid);
        Session::flash('comment-changed', "komment módosítása");
        return redirect(url()->previous().'#'.$comment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment -> delete();
        Session::flash('comment-changed', "komment törlése");
        return redirect(url()->previous().'#comments');
    }
}
