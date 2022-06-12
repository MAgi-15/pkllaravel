<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function getAllCustomer()
    {
        return response()->json([
            'message' => 'success',
            'data' => Customer::all()
        ], 200);
    }

    public function getCustomerbyId($id)
    {
        $customer = Customer::where('id', $id)->first();
        if ($customer) {
            return response()->json([
                'message' => 'success',
                'data' => $customer,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
        }
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama_depan' => ['string', 'required', 'max:255'],
            'nama_belakang' => ['string', 'required', 'max:255'],
            'no_hp' => ['required'],
        ]);

        $customer = Customer::create([
            'nama_depan' => $validated['nama_depan'],
            'nama_belakang' => $validated['nama_belakang'],
            'no_hp' => $validated['no_hp'],
        ]);

        if ($customer) {
            return response()->json([
                'message' => 'success',
                'data' => $customer,
            ]);
        } else {
            return response()->json([
                'message' => 'field',
            ]);
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'no_hp' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                $validator->errors()
            ], 400);
        }
        $customer = Customer::find($id);

        if ($customer) {
            $customer->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'no_hp' => $request->no_hp
            ]);

            $customer->save();

            return response()->json([
                'message' => 'success',
                'data' => $customer
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no data found',
                'data' => null
            ], 500);
        }
    }
}
