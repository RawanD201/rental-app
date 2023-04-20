<?php

namespace App\Http\Controllers;

use App\Models\Capital;
use Illuminate\Http\Request;

class CapitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $capitals = Capital::latest('id')->paginate(4);
        return \view('capital.create', \compact('capitals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'capital_money' => ['required', 'numeric', 'max:9999999999999999999']
        ]);
        $capital = Capital::create([
            'capital_money' => $request->capital_money,
            'note' => $request->note,
            'date' => $request->date,
        ]);
        return redirect()->route('capital.create');
    }


    public function update(Request $request, int $id)
    {
        $capital = Capital::find($id);
        $capital->update([
            'capital_money' => $request->capital_money,
            'note' => $request->note,
            'date' => $request->date,
        ]);
        return \back()->with([
            'success' => __('index.admin.messages.capital.success.update')
        ]);
    }

    public function destroy(Capital $capital)
    {
        $capital->delete();
        return \back()->with([
            'success' => __('index.admin.messages.capital.success.delete')
        ]);
    }
}
