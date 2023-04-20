<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        $customers = Customer::latest('id')->paginate(4);
        return view('customer.create', \compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150', 'unique:expenses_type']
        ]);
        $customer = Customer::create([
            'name' => $request->name,
        ]);
        return redirect()->route('customer.create');
    }


    public function update(Request $request, int $id)
    {


        $customer = Customer::find($id);
        $customer->update([
            'name' => $request->name,
        ]);
        return \back()->with([
            'success' => __('index.admin.messages.customer.success.update')
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return \back()->with([
            'success' => __('admin.messages.customer.success.delete')
        ]);
    }
}
