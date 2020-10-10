<?php

namespace App\Http\Controllers;

use App\comment;
use App\commentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $replies = commentReply::all();
        $comments = Comment::all();

        return view('padma.layout.comments.replies.index', compact('replies', 'comments'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comment = Comment::findOrFail($id);
        $replies = $comment->replies;

        return view('padma.layout.comments.replies.show', compact('replies', 'comment'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reply = commentReply::findOrFail($id);
        return view('padma.layout.comments.replies.edit', compact('reply'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $commentReply = commentReply::findOrFail($id);

        if ($commentReply->status == 'Inactive') {
            $commentReply->status = 'Pending';
        } elseif ($commentReply->status == 'Pending') {
            $commentReply->status = 'Active';
        } else {
            $commentReply->status = 'Inactive';
        }

        $commentReply->update($request->all());
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        commentReply::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function createReply(Request $request)
    {

        $user = Auth::user();
        // $id = Auth::id();
        $commentReply = new CommentReply;
        $commentReply->comment_id = $request->comment_id;
        // $commentReply->author = $user->name;
        // $commentReply->email = $user->email;
        $commentReply->user_id = $user->id;

        $commentReply->body = $request->body;


        // Comment::create($data);

        $commentReply->save();


        $request->session()->flash('reply message', 'your reply has been submitted');

        return redirect()->back();


    }

    public function showComment($id)
    {
        //

        $replies = commentReply::findOrFail($id);
        $comments = $replies->comments;
        return view('padma.layout.comments.show', compact('comments'));

    }

    public function updateReply(Request $request, $id)
    {
        $reply = commentReply::findOrFail($id);
        $reply->body = $request->body;
        $reply->update();

        $replies = commentReply::all();
        return view('padma.layout.comments.replies.index', compact('replies'));


    }

    public function deleteReply(Request $request)
    {

        if (!empty($request->checkBoxArray)) {
            $replies = commentReply::findOrFail($request->checkBoxArray);
            foreach ($replies as $reply) {


                $reply->delete();
            }
            // return "it work";
            return redirect()->back();

        } else {

            return redirect()->back();

            // return "it work";
        }
    }




}
