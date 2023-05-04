<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;

class MerchantController extends Controller
{

    public function index()
    {
        $merchants = Merchant::latest()->paginate('10');
        return view('merchant.index', compact('merchants'));
    }


    public function create()
    {
        $merchants = Merchant::latest()->paginate(10);
        return \view('merchant.create', \compact('merchants'));
    }


    public function store(StoreMerchantRequest $req)
    {
        $req->storeRecord();
        return \redirect()->route('merchant.index')->with([
            'success' => __('index.admin.messages.merchant.success.create')
        ]);
    }



    public function edit(Merchant $merchant)
    {
        return \view('merchant.edit', \compact('merchant'));
    }


    public function update(UpdateMerchantRequest $req, Merchant $merchant)
    {
        $req->updateRecord($merchant);
        return \redirect()->route('merchant.index')->with([
            'merchant' => $merchant,
            'success' => __('index.admin.messages.merchant.success.update')
        ]);
    }


    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return \back()->with([
            'success' => __('index.admin.messages.merchant.success.delete')
        ]);
    }
}
