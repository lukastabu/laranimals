@extends('main')
@section('content')
    <h3>Ėdalo koregavimas</h3>

    <div class="gardelis">
        <form action="{{ route('food-update', $food) }}" method="POST">
            Ėdalas: <input type="text" name="food_title" value="{{ $food->title }}" />
            <br>
            Kam skirtas Ėdalas:
            <select name="animal_id">
                @foreach ($animals as $animal)
                    <option value="{{ $animal->id }}" @if ($animal->id == $food->animal_id) selected @endif>
                        {{ $animal->name }}</option>
                @endforeach
            </select>
            <br>
            @csrf
            @method('put')
            <button type="submit" class="go-btn">Pakeisti</button>
        </form>
    </div>
@endsection
