<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'brand' => 'required|string',
        ]);

        Car::create([
            'name' => $request->name,
            'color' => $request->color,
            'brand' => $request->brand,
        ]);

        return redirect('/cars/create')->with('success', 'Car added successfully!');
    }
    public function allcars()
    {
        $cars = Car::all(); // fetch all cars
        return view('cars.react-allcars', compact('cars'));
    }
    public function reactCars()
    {
        $cars = Car::all();
        return view('cars.react-allcars', [
            'cars' => $cars,
        ]);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->back()->with('success', 'Car deleted successfully!');
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'brand' => 'required|string',
        ]);

        $car = Car::findOrFail($id);
        $car->update([
            'name' => $request->name,
            'color' => $request->color,
            'brand' => $request->brand,
        ]);

        return redirect()->route('cars.allcars')->with('success', 'Car updated successfully!');
    }
}
