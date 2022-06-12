<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getCommentbyId($id)
    {
        $comment = Comment::where('thread_id', $id)->get();
        if ($comment) {
            return response()->json([
                'message' => 'success',
                'data' => $comment,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }
    public function createComment(Request $request)
    {
        $validated = $request->validate([
            'thread_id' => ['required'],
            'username' => ['string', 'required', 'max:255'],
            'comment' => ['string', 'required', 'max:255'],
        ]);

        $comment = Comment::create([
            'thread_id' => $validated['thread_id'],
            'username' => $validated['username'],
            'comment' => $validated['comment'],
        ]);

        if ($comment) {
            return response()->json([
                'message' => 'success',
                'data' => $comment,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }
}
