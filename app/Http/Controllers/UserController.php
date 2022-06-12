<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user_data', compact('users'));
    }
    public function tambah()
    {
        return view('user_tambah');
    }
    public function simpan(Request $request)
    {
        $encrypted = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $encrypted,
        ]);
        return redirect('/user');
    }
    // public function edit($id)
    // {
    //     $customer = Customer::find($id);
    //     return view('customer_edit', ['customer' => $customer]);
    // }
    // public function update($id, Request $request)
    // {
    //     $this->validate($request, [
    //         'nama_depan' => 'required',
    //         'nama_belakang' => 'required',
    //         'no_hp' => 'required'
    //     ]);

    //     $customer = Customer::find($id);
    //     $customer->nama_depan = $request->nama_depan;
    //     $customer->nama_belakang = $request->nama_belakang;
    //     $customer->no_hp = $request->no_hp;
    //     $customer->save();
    //     return redirect('/customer');
    // }
    // public function hapus($id)
    // {
    //     $customer = Customer::find($id);
    //     $customer->delete();
    //     return redirect('/customer');
    // }
}
