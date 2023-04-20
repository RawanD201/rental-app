<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Car;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capital;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('index', \compact('expense', 'sell', 'buy', 'vault', 'dastmaia', 'capital', 'profit', 'maxzans'));
    }
}
