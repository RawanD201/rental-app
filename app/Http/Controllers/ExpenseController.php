<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\ExpensesType;

class ExpenseController extends Controller
{

    public function index()
    {
        // $expenses = Expense::with('user')->latest()->paginate(7);
        $expenses = Expense::with(['expenseType' => fn ($q) =>  $q->withTrashed()->get()])->latest()->paginate('10');

        return view('expense.index', compact('expenses'));
    }


    public function create()
    {
        $expenses = Expense::with('user')->latest()->paginate(10);
        $expense_types = ExpensesType::query()->get();
        return \view('expense.create', \compact('expenses', 'expense_types'));
    }


    public function store(StoreExpenseRequest $req)
    {
        $req->storeRecord();
        return \redirect()->route('expense.index')->with([
            'success' => __('index.admin.messages.expense.success.create')
        ]);
    }



    public function edit(Expense $expense)
    {
        $expense_types = ExpensesType::query()->get();
        return \view('expense.edit', \compact('expense', 'expense_types'));
    }


    public function update(UpdateExpenseRequest $req, Expense $expense)
    {
        $req->updateRecord($expense);
        return \redirect()->route('expense.index')->with([
            'expense' => $expense,
            'success' => __('index.admin.messages.expense.success.update')
        ]);
    }


    public function destroy(Expense $expense)
    {
        $expense->delete();
        return \back()->with([
            'success' => __('index.admin.messages.expense.success.delete')
        ]);
    }
}
