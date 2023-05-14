<?php

namespace App\Http\Controllers;

use App\Models\Treat;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTreatRequest;
use App\Http\Requests\UpdateTreatRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;
use PHPUnit\Event\Tracer\Tracer;

class TreatController extends Controller
{

    public function dashboard()
    {
        $amount = Treat::sum('amount_price');
        $recive = Treat::sum('recive_price');
        $total = Treat::sum('total_price');
        return \view('treat.dashboard', \compact('amount', 'recive', 'total'));
    }

    public function create(Request $req)
    {
        $treatId = $req->query('treat', null);

        if ($treatId == null) {
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.search.merchant')
            ]);
        }
        $treats = Treat::latest()->paginate(8);
        $merchants = Merchant::all();
        return \view('treat.create', \compact('treats', 'merchants'));
    }

    public function index(Request $req)
    {
        $merchants = Merchant::all();
        $searchName = $req->query('search', null);

        $treats = Treat::with('merchant')
            ->whereHas(
                'merchant',
                fn ($q) =>
                $searchName ? $q->where('id', $searchName) : $q
            )->where('recive_price', '=', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('treat.index', compact('merchants', 'treats'));
    }

    public function pdf(Request $req)
    {

        $id = $req->query('treat', null);
        if ($id == null) {
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.search.merchant')
            ]);
        }
        $treats = $this->getTreatQueryByFilter($req)->get();

        $treat = Merchant::select('name', 'phone', 'location')
            ->where('id', $id)
            ->first();

        $total  = $this->getTreatQueryByFilter($req)
            ->select($this->getSumFields())
            ->first();

        return \view('treat.pdf', \compact('treats', 'treat', 'total'));
    }

    public function report(Request $req)
    {

        $merchantNames = Merchant::distinct('name')->get();
        $merchantPhones = Merchant::distinct('phone')->get();
        $merchantCars = Treat::with('merchant')->distinct('car_name')->pluck('car_name');
        $merchantCarNumbers = Treat::with('merchant')->distinct('car_number')->pluck('car_number');
        $merchantShasis = Treat::with('merchant')->distinct('shasi_number')->pluck('shasi_number');
        $merchantColors = Treat::with('merchant')->distinct('color')->pluck('color');
        $merchantModels = Treat::with('merchant')->distinct('model')->pluck('model');
        $merchantBorders = Treat::with('merchant')->distinct('border')->pluck('border');
        $merchantTransports = Treat::with('merchant')->distinct('transport_price')->pluck('transport_price');
        $merchantCocs = Treat::with('merchant')->distinct('coc_price')->pluck('coc_price');
        $merchantCustoms = Treat::with('merchant')->distinct('custom_price')->pluck('custom_price');
        $merchantBalances = Treat::with('merchant')->distinct('balance_price')->pluck('balance_price');
        $merchantTotals = Treat::with('merchant')->distinct('total_price')->pluck('total_price');
        $merchantRecives = Treat::with('merchant')->distinct('recive_price')->pluck('recive_price');
        $merchantAmounts = Treat::with('merchant')->distinct('amount_price')->pluck('amount_price');
        $merchantInshs = Treat::with('merchant')->distinct('in_sh')->pluck('in_sh');
        $merchantInvagrs = Treat::with('merchant')->distinct('inv_agr')->pluck('inv_agr');


        $treats = $this->getTreatQueryByFilter($req)->orderBy('created_at', 'desc')
            ->paginate(13);

        $nextQueryStrings = [];
        \parse_str($req->getQueryString(), $nextQueryStrings);
        $nextQueryStrings = collect($nextQueryStrings)
            ->filter(fn ($el) => \strlen($el) > 0)
            ->toArray();


        return view('treat.report', compact(
            'treats',
            'nextQueryStrings',
            'merchantNames',
            'merchantCarNumbers',
            'merchantPhones',
            'merchantCars',
            'merchantShasis',
            'merchantColors',
            'merchantModels',
            'merchantBorders',
            'merchantTransports',
            'merchantCocs',
            'merchantCustoms',
            'merchantBalances',
            'merchantTotals',
            'merchantRecives',
            'merchantAmounts',
            'merchantInshs',
            'merchantInvagrs'
        ));
    }

    public function reportPdf(Request $req)
    {

        $nextQueryStrings = [];
        \parse_str($req->getQueryString(), $nextQueryStrings);
        $nextQueryStrings = collect($nextQueryStrings)
            ->filter(fn ($el) => \strlen($el) > 0)
            ->toArray();

        $treats = $this->getTreatQueryByFilter($req)->orderBy('created_at', 'desc')
            ->get();

        $total  = $this->getTreatQueryByFilter($req)
            ->select($this->getSumFields())
            ->first();

        return view('treat.report-pdf', compact('nextQueryStrings', 'total', 'treats'));
    }

    public function store(StoreTreatRequest $req,)
    {
        $req->storeRecord();
        return \redirect()->route('treat.index')->with([
            'success' => __('index.admin.messages.treat.success.create')
        ]);
    }


    public function edit(Treat $treat)
    {
        return \view('treat.edit', \compact('treat'));
    }


    public function update(UpdateTreatRequest $req, Treat $treat)
    {
        $req->updateRecord($treat);
        return \redirect()->route('treat.index')->with([
            'treat' => $treat,
            'success' => __('index.admin.messages.treat.success.update')
        ]);
    }


    public function destroy(Treat $treat)
    {
        $treat->delete();
        return \back()->with([
            'success' => __('index.admin.messages.treat.success.delete')
        ]);
    }

    public function archive(Request $req)
    {
        $treats = Treat::with('merchant')
            ->where('recive_price', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(13);

        return view('treat.archive', compact('treats'));
    }


    private function getTreatQueryByFilter(Request $req): Builder
    {
        $name = $req->query('name', null);
        $phone = $req->query('phone', null);
        $location = $req->query('location', null);
        $car_name = $req->query('car_name', null);
        $car_number = $req->query('car_number', null);
        $border = $req->query('border', null);
        $color = $req->query('color', null);
        $model = $req->query('model', null);
        $shasi_number = $req->query('shasi_number', null);
        $coc_price = $req->query('coc_price', null);
        $transport_price = $req->query('transport_price', null);
        $custom_price = $req->query('custom_price', null);
        $balance_price = $req->query('balance_price', null);
        $total_price = $req->query('total_price', null);
        $recive_price = $req->query('recive_price', null);
        $amount_price = $req->query('amount_price', null);
        $in_sh = $req->query('in_sh', null);
        $inv_agr = $req->query('inv_agr', null);
        $date = $req->query('date', null);
        $startdate = $req->query('startdate', null);
        $enddate = $req->query('enddate', null);

        return Treat::query()
            ->with('merchant')
            ->whereHas(
                'merchant',
                fn ($q) => $q
                    ->when($name, fn ($q) => $q->where('name', $name))
                    ->when($phone, fn ($q) => $q->where('phone', $phone))
                    ->when($location, fn ($q) => $q->where('location', $location))
            )
            ->when($car_name, fn ($q) => $q->where('car_name', 'LIKE', "%{$car_name}%"))
            ->when($car_number, fn ($q) => $q->where('car_number', 'LIKE', "%{$car_number}%"))
            ->when($border, fn ($q) => $q->where('border', 'LIKE', "%{$border}%"))
            ->when($color, fn ($q) => $q->where('color', 'LIKE', "%{$color}%"))
            ->when($model, fn ($q) => $q->where('model', 'LIKE', "%{$model}%"))
            ->when($shasi_number, fn ($q) => $q->where('shasi_number', 'LIKE', "%{$shasi_number}%"))
            ->when($coc_price, fn ($q) => $q->where('coc_price', 'LIKE', "%{$coc_price}%"))
            ->when($transport_price, fn ($q) => $q->where('transport_price', 'LIKE', "%{$transport_price}%"))
            ->when($custom_price, fn ($q) => $q->where('custom_price', 'LIKE', "%{$custom_price}%"))
            ->when($balance_price, fn ($q) => $q->where('balance_price', 'LIKE', "%{$balance_price}%"))
            ->when($total_price, fn ($q) => $q->where('total_price', 'LIKE', "%{$total_price}%"))
            ->when($recive_price, fn ($q) => $q->where('recive_price', 'LIKE', "%{$recive_price}%"))
            ->when($amount_price, fn ($q) => $q->where('amount_price', 'LIKE', "%{$amount_price}%"))
            ->when($in_sh, fn ($q) => $q->where('in_sh', 'LIKE', "%{$in_sh}%"))
            ->when($inv_agr, fn ($q) => $q->where('inv_agr', 'LIKE', "%{$inv_agr}%"))
            ->when($startdate, fn ($q) => $q->whereDate('created_at', '>=', $startdate))
            ->when($enddate, fn ($q) => $q->whereDate('created_at', '<=', $enddate));
    }

    private function getSumFields(): array
    {
        return [
            DB::raw('SUM(transport_price) as transport_total'),
            DB::raw('SUM(coc_price) as coc_total'),
            DB::raw('SUM(custom_price) as custom_total'),
            DB::raw('SUM(balance_price) as balance_total'),
            DB::raw('SUM(total_price) as total'),
            DB::raw('SUM(recive_price) as recive_total'),
            DB::raw('SUM(amount_price) as amount_total'),
        ];
    }
}
