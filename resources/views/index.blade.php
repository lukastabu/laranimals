@extends('main')
{{-- <h2 style="color: blue;">sveiki atvyke, {{$vardas}}!</h2> --}}

@section('content')
    <ul>
        @forelse ($animals as $animal)
            <li>
                <div class="gardelis">
                    Gyvūnas: {{ $animal->name }};
                    Rūšis: {{ $animal->species }};
                    Svoris: {{ $animal->weight }};
                </div>
            </li>
            <a href="{{ route('edit', $animal) }}">Koreguoti</a>
            <form class="trintukas" action="{{ route('delete', $animal) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Pašalinti</button>
            </form>


        @empty
            <li>Kol kas tusčia. Pridėk ką nors!</li>
        @endforelse
    </ul>
    
    <a href="{{ route('create') }}">Pridėti ką nors</a>

@endsection
