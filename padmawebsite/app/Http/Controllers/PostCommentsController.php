<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        /*   $id = Auth::id();
           $user = Auth::user();
           $user = Auth::login();

           return ($user->status);*/

        $comments = Comment::all();

        return view('padma.layout.comments.index', compact('comments'));
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

        //return $request->all();

        $user = Auth::user();
        $id = Auth::id();
        $comment = new Comment;

        /*        $data = [

                    'post_id' => $request->post_id,
                    'author' => $user->name,
                    'email' => $user->email,
                   // if($user->user_photo->photo_path)
                    //'photo' => $user->user_photo->photo_path,
                    'body' => $request->body,

                ];*/

        $comment->post_id = $request->post_id;
        // $comment->author = $user->name;
        // $comment->email= $user->email;
        $comment->user_id = $id;
        // if(!empty($user->user_photo->photo_path))
        // $comment->photo = $user->user_photo->photo_path;
        $comment->body = $request->body;


        // Comment::create($data);

        $comment->save();


        $request->session()->flash('comment message', 'your comment has been submitted');

        return redirect()->back();

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

        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('padma.layout.comments.show', compact('comments'));

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
        $comment = Comment::findOrFail($id);


        return view('padma.layout.comments.edit', compact('comment'));

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

        $comment = Comment::findOrFail($id);
        if ($comment->status == 'Inactive') {
            $comment->status = 'Pending';
        } elseif ($comment->status == 'Pending') {
            $comment->status = 'Active';
            //dd($comment);
        } else {
            $comment->status = 'Inactive';
        }


        $comment->update($request->all());
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
        Comment::findOrFail($id)->delete();
        return redirect()->back();

    }

    public function updateComment(Request $request, $id)
    {
        $comment = comment::findOrFail($id);
        $comment->body = $request->body;
        $comment->update();

        $comments = comment::all();
        return view('padma.layout.comments.index', compact('comments'));

    }

    public function deleteComment(Request $request)
    {

        if (!empty($request->checkBoxArray)) {
            $comments = comment::findOrFail($request->checkBoxArray);
            foreach ($comments as $comment) {


                $comment->delete();
            }
            // return "it work";
            return redirect()->back();

        } else {

            return redirect()->back();

            // return "it work";
        }
    }



}
