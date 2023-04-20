<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpensesType;


class ExpenseTypeController extends Controller
{
    public function create()
    {
        $expense_types = ExpensesType::latest('id')->paginate(4);
        return view('expenseType.create', \compact('expense_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150', 'unique:expenses_type']
        ]);
        $expense_type = ExpensesType::create([
            'name' => $request->name,
        ]);
        return redirect()->route('expense.create');
    }


    public function update(Request $request, int $id)
    {


        $expense_type = ExpensesType::find($id);
        $expense_type->update([
            'name' => $request->name,
        ]);
        return \back()->with([
            'success' => __('index.admin.messages.expenseType.success.update')
        ]);
    }

    public function destroy(ExpensesType $expenseType)
    {
        $expenseType->delete();
        return \back()->with([
            'success' => __('admin.messages.expenseType.success.delete')
        ]);
    }
}
