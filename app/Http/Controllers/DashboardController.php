<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capital;
use App\Models\Car;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $expense = Expense::with('user')->sum('expense_price');
        $dastmaia  = Capital::query()->sum('capital_money');
        $maxzan  = Car::where('sell_price', 0)->select(DB::raw('SUM(america_price + dubai_transfer + repair_price + gumrk_price) as price_sums'))->first();
        $sell = DB::table('cars')->where('sell_price', '>', 0)->sum('sell_price');
        $buy = DB::table('cars')->select(DB::raw('SUM(america_price + dubai_transfer + repair_price + gumrk_price) as price_sums'))->first();
        $profit = $sell - ($buy->price_sums);
        $capital  = $profit + $dastmaia;
        $vault = $capital - $buy->price_sums;
        $maxzans = $maxzan->price_sums;
        return view('dashboard', \compact('expense', 'sell', 'buy', 'vault', 'dastmaia', 'capital', 'profit', 'maxzans'));
    }
}
