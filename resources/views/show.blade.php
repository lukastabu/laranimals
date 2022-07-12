@extends('main')
@section('content')
    <ul>
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
            <a class="chg-btn" href="{{ route('edit', $animal) }}">Koreguoti</a>
            <form class="trintukas" action="{{ route('delete', $animal) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="del-btn">Pašalinti</button>
            </form>
        </div>
    </ul>
@endsection
