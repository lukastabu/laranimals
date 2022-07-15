<?php

namespace App\Http\Controllers;
use App\Models\Animal;

use Illuminate\Http\Request;

class AnimalController extends Controller
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

        $animals = match($request->sort) {
            'asc' => Animal::orderBy('name', 'asc')->get(),
            'desc' => Animal::orderBy('name', 'desc')->get(),
            default => Animal::all(),
        };

        return view('index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal;

        $animal -> name = $request->animal_name;
        $animal -> species = $request->animal_species;
        $animal -> weight = $request->animal_weight;
        $animal -> house = $request->animal_house ?? 'Laukinis benamis';

        $animal -> save();

        return redirect()->route('index')->with('success', 'Naujas gyvūnas sukurtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(int $animalId)
    {
        $animal = Animal::where('id', $animalId)->first();

        return view('show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        return view('edit', ['animal' => $animal ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal -> name = $request->animal_name;
        $animal -> species = $request->animal_species;
        $animal -> weight = $request->animal_weight;
        $animal -> house = $request->animal_house ?? 'Laukinis benamis';

        $animal -> save();

        return redirect()->route('index')->with('success', 'Gyvūnas pakoreguotas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        if(!$animal ->takefood->count()) {
            $animal -> delete();
            return redirect()->route('index')->with('deleted', 'Gyvūnas ištrintas');
        }
        return redirect()->back()->with('deleted', 'Gyvūnas negali būt ištrintas, nes jam priklauso Ėdalas');
    }
}
