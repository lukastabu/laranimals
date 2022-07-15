@extends('main')
{{-- <h2 style="color: blue;">sveiki atvyke, {{$vardas}}!</h2> --}}
@section('content')
    <div class="srt-menu">
        <a class="srt-btn" href="{{ route('food-index', ['sort' => 'asc']) }}">Sort Ascending</a>
        <a class="srt-btn" href="{{ route('food-index', ['sort' => 'desc']) }}">Sort Descending</a>
        <a class="srt-btn" href="{{ route('food-index') }}">Reset Sorting</a>
    </div>
    
    <ul>
        @forelse ($foods as $food)
            <div class="gardelis">
                Ėdalas: {{ $food->title }}
                <br>
                Priklauso gyvūnui: {{ $food->takeanimal->name }}
                <br>
                <a class="chg-btn" href="{{ route('food-show', $food->id) }}">Daugiau</a>
                <a class="chg-btn" href="{{ route('food-edit', $food) }}">Koreguoti</a>
                <form class="trintukas" action="{{ route('food-delete', $food) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="del-btn">Pašalinti</button>
                </form>
            </div>
        @empty
            <span>Kol kas tusčia. Pridėk ėdalo!</span>
        @endforelse
    </ul>
@endsection
