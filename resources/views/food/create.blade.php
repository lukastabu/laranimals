@extends('main')
@section('content')
<h2>Kuriamas naujas ėdalas</h2>
<div class="gardelis">
        <form action="{{ route('food-store') }}" method="POST">
            Ėdalas: <input type="text" name="food_title" size="12" />
            <br>
            Kam skirtas Ėdalas:
            <select name="animal_id">
                @foreach ($animals as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                @endforeach
            </select>

            <br>

            <br>
            @csrf
            <button type="submit" class="go-btn">Pridėti</button>
        </form>
    </div>
@endsection
