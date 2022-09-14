<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comments = new Comment();
        $comments->message = $request->get('comment_body');
        $comments->user_id = Auth::user()->id;
        $bug = Bug::find($request->get('bug_id'));
        $bug->comments()->save($comments);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->message = $request->get('comment_body');
        $reply->user_id = Auth::user()->id;
        $comment = Comment::find($request->get('comment_id'));
        $comment->comments()->save($reply);

        return back();
    }
}
