<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function getLikebyId($id)
    {
        $like = Like::where('thread_id', $id)->get();
        if ($like) {
            return response()->json([
                'message' => 'success',
                'data' => $like,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }
    public function createLike(Request $request)
    {
        //1. cek ke database datanya ada atau ngga di table like
        $like = Like::where('thread_id', $request->thread_id)->where('username', $request->username)->first();

        //2. jika datanya ada/data listnya tidak 0, maka melakukan proses delete
        if ($like) {
            $deleted = Like::where('thread_id', $request->thread_id)->where('username', $request->username)->delete();
            return response()->json([
                'message' => 'deleted',
                'data' => $deleted
            ]);
        }
        //3. jika data yang datanya tidak tersedia maka dia melanjutkan proses create/post like
        else {
            $validated = $request->validate([
                'thread_id' => ['required'],
                'username' => ['string', 'required', 'max:255'],
            ]);

            $like = Like::create([
                'thread_id' => $validated['thread_id'],
                'username' => $validated['username'],
            ]);
            if ($like) {
                return response()->json([
                    'message' => 'success',
                    'data' => $like,
                ]);
            } else {
                return response()->json([
                    'message' => 'field',
                ]);
            }
        }

        // $validated = $request->validate([
        //     'thread_id' => ['required'],
        //     'username' => ['string', 'required', 'max:255'],
        // ]);

        // $like = Like::create([
        //     'thread_id' => $validated['thread_id'],
        //     'username' => $validated['username'],
        // ]);

        // if ($like) {
        //     return response()->json([
        //         'message' => 'success',
        //         'data' => $like,
        //     ]);
        // } else {
        //     return response()->json([
        //         'message' => 'field',
        //     ]);
        // }
    }
}
