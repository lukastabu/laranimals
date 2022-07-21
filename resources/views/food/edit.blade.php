@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ėdalo koregavimas</div>

                    <div class="card-body">
                        <div class="gardelis">
                            <form action="{{ route('food-update', $food) }}" method="POST">
                                Ėdalas: <input type="text" name="food_title" value="{{ $food->title }}" />
                                <br>
                                Kam skirtas Ėdalas:
                                <select name="animal_id">
                                    @foreach ($animals as $animal)
                                        <option value="{{ $animal->id }}"
                                            @if ($animal->id == $food->animal_id) selected @endif>
                                            {{ $animal->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-outline-success">Pakeisti</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
