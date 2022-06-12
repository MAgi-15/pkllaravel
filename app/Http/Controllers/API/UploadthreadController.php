<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Http\Request;

class UploadthreadController extends Controller
{
    public function readThread()
    {
        return response()->json([
            'message' => 'success',
            'data' => Thread::all()
        ], 200);
    }
    public function newThread(Request $request)
    {
        //mengubah image dalam bentuk base64
        $base64_image = $request->Gambar;
        $image = base64_decode(preg_replace('#^data:image/jpeg;base64,#i', '', $base64_image));

        $image_name = "thread-post-" . date('Y-m-d-') . md5(uniqid(rand(), true)); // image name generating with random number with 32 characters
        $filename = $image_name . '.' . 'jpg';
        //rename file name with random number
        $path = public_path('data_file/');

        //image uploading folder path
        file_put_contents($path . $filename, $image);
        $post_image = 'data_file/' . $filename;

        $thread = Thread::create([
            'User' => $request->User,
            'Thread' => $request->Thread,
            'Gambar' => $post_image,
            'Judul' => $request->Judul,
            'Komunitas' => $request->Komunitas
        ]);

        if ($thread) {
            return response()->json([
                'message' => 'success',
                'data' => $thread,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }
    public function getThreadbyUser($User)
    {
        $thread = Thread::where('User', $User)->get();
        if ($thread) {
            return response()->json([
                'message' => 'success',
                'data' => $thread,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }
}
