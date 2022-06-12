<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getAllUser()
    {
        return response()->json([
            'message' => 'success',
            'data' => User::all()
        ], 200);
    }

    public function getUserbyId($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                $validator->errors()
            ], 400);
        }

        $encrypted = Hash::make($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $encrypted,
        ]);

        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }
    public function login(Request $request)
    {
        try {
            $user = DB::table('users')->where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'data falid',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Password salah'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'username atau password salah'
            ], 200);
        }
    }
    public function register(Request $request)
    {
        try {
            $user = DB::table('users')->where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'data falid',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Password salah'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'username atau password salah'
            ], 200);
        }
    }
    // public function update($id, Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama_depan' => ['string', 'required', 'max:255'],
    //         'nama_belakang' => ['string', 'required', 'max:255'],
    //         'no_hp' => ['required'],
    //     ]);
    //     $customer = Customer::find($id);

    //     if ($customer) {
    //         $customer->nama_depan = $validated['nama_depan'];
    //         $customer->nama_belakang = $validated['nama_belakang'];
    //         $customer->no_hp = $validated['no_hp'];

    //         $customer->save();

    //         return response()->json([
    //             'message' => 'success',
    //             'data' => $customer
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'message' => 'There is no data found',
    //             'data' => null
    //         ], 500);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama_depan' => 'required|string',
    //         'nama_belakang' => 'required|string',
    //         'no_hp' => 'required|string',
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             $validator->errors()
    //         ], 400);
    //     }
    //     $customer = Customer::find($id);

    //     if ($customer) {
    //         $customer->update([
    //             'nama_depan' => $request->nama_depan,
    //             'nama_belakang' => $request->nama_belakang,
    //             'no_hp' => $request->no_hp
    //         ]);

    //         $customer->save();

    //         return response()->json([
    //             'message' => 'success',
    //             'data' => $customer
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'message' => 'There is no data found',
    //             'data' => null
    //         ], 500);
    //     }
    // }
}
