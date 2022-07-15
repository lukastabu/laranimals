@extends('main')
@section('content')
            <div class="gardelis">
                Ėdalas: {{ $food->title }}
                <br>
                Priklauso gyvūnui: {{ $food->takeanimal->name }}
                <br>
                <a class="chg-btn" href="{{ route('food-edit', $food) }}">Koreguoti</a>
                <form class="trintukas" action="{{ route('food-delete', $food) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="del-btn">Pašalinti</button>
                </form>
            </div>
@endsection
