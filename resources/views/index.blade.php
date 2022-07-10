@extends('main')
{{-- <h2 style="color: blue;">sveiki atvyke, {{$vardas}}!</h2> --}}

@section('content')
    <ul>
        @forelse ($animals as $animal)
                <div class="gardelis">
                    Gyvūnas: {{ $animal->name }} 
                    <br>
                    Rūšis: 
                    @if ($animal->species == "1")
                        Žinduolis
                    @elseif ($animal->species == "2")
                        Paukštis
                    @else
                        Žuvis
                    @endif
                    <br>
                    Svoris: {{ $animal->weight }} kg
            <br>
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
    
    <a class="add-btn" href="{{ route('create') }}">Pridėti gyvūną</a>

@endsection
