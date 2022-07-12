@extends('main')
{{-- <h2 style="color: blue;">sveiki atvyke, {{$vardas}}!</h2> --}}
@section('content')
    <div class="srt-menu">
    <a class="srt-btn" href="{{ route('index', ['sort' => 'asc']) }}">Sort Ascending</a>
    <a class="srt-btn" href="{{ route('index', ['sort' => 'desc']) }}">Sort Descending</a>
    <a class="srt-btn" href="{{ route('index') }}">Reset Sorting</a>
    </div>

    <ul>
        @forelse ($animals as $animal)
            <div class="gardelis">
                Gyvūnas: {{ $animal->name }}
                <br>
                Rūšis:
                @if ($animal->species == '1')
                    Žinduolis
                @elseif ($animal->species == '2')
                    Paukštis
                @else
                    Žuvis
                @endif
                <br>
                Svoris: {{ $animal->weight }} kg
                <br>
                Būstas: {{ $animal->house }}

                <br>
                <a class="chg-btn" href="{{ route('show', $animal->id) }}">Daugiau</a>
                <a class="chg-btn" href="{{ route('edit', $animal) }}">Koreguoti</a>
                <form class="trintukas" action="{{ route('delete', $animal) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="del-btn">Pašalinti</button>
                </form>
            </div>
        @empty
            <span>Kol kas tusčia. Pridėk gyvūnų!</span>
        @endforelse
    </ul>
@endsection
