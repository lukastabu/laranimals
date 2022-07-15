<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $animals = Animal::all()->sortByDesc('name');
        // $animals = Animal::orderBy('name')->get();
        // $animals = Animal::orderBy('name', 'desc')->orderBy('weight', 'asc')->get();
        // $animals = Animal::where('id', '>', 1)->orderBy('name')->get();

        $foods = match($request->sort) {
            'asc' => Food::orderBy('name', 'asc')->get(),
            'desc' => Food::orderBy('name', 'desc')->get(),
            default => Food::all(),
        };

        return view('food.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals = Animal::all();

        return view('food.create', ['animals' => $animals]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;

        $food -> title = $request->food_title ?? 'Food not labeled';;
        $food -> animal_id = $request->animal_id;

        $food -> save();

        return redirect()->route('food-index')->with('success', 'Naujas ėdalas sukurtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(int $foodAidysas)
    {
        $food = Food::where('id', $foodAidysas)->first();

        return view('food.show', ['food' => $food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $animals = Animal::all();

        return view('food.edit', [
            'food' => $food,
            'animals' => $animals,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $food -> title = $request->food_title ?? 'Food not labeled';;
        $food -> animal_id = $request->animal_id;

        $food -> save();

        return redirect()->route('food-index')->with('success', 'Ėdalas pakoreguotas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food -> delete();

        return redirect()->route('food-index')->with('deleted', 'Ėdalas ištrintas');
    }
}
