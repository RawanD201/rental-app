<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('user')->latest()->paginate(10);
        return \view('car.index', \compact('cars'));
    }

    public function create()
    {
        $cars = Car::with('user')->latest()->paginate(10);
        return \view('car.create', \compact('cars'));
    }


    public function store(StoreCarRequest $req)
    {
        $req->storeRecord();
        return \redirect()->route('car.index')->with([
            'success' => __('index.admin.messages.car.success.create')
        ]);
    }


    public function edit(Car $car)
    {
        return \view('car.edit', \compact('car'));
    }


    public function update(UpdateCarRequest $req, Car $car)
    {
        $req->updateRecord($car);
        return \redirect()->route('car.index')->with([
            'car' => $car,
            'success' => __('index.admin.messages.car.success.update')
        ]);
    }


    public function destroy(Car $car)
    {
        $car->delete();
        return \back()->with([
            'success' => __('index.admin.messages.car.success.delete')
        ]);
    }
}
