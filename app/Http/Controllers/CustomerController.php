<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::get();
        return view('customer', compact('customer'));
    }
    public function tambah()
    {
        return view('customer_tambah');
    }
    public function simpan(Request $request)
    {
        Customer::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
        ]);
        return redirect('/customer');
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer_edit', ['customer' => $customer]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required'
        ]);

        $customer = Customer::find($id);
        $customer->nama_depan = $request->nama_depan;
        $customer->nama_belakang = $request->nama_belakang;
        $customer->no_hp = $request->no_hp;
        $customer->save();
        return redirect('/customer');
    }
    public function hapus($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer');
    }
}
