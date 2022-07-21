@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gyvūnų sąrašas</div>
                    <div class="card-body">
                        <div class="srt-menu">
                            <a class="btn btn-outline-info" href="{{ route('index', ['sort' => 'asc']) }}">Sort Ascending</a>
                            <a class="btn btn-outline-info" href="{{ route('index', ['sort' => 'desc']) }}">Sort Descending</a>
                            <a class="btn btn-outline-info" href="{{ route('index') }}">Reset Sorting</a>
                        </div>

                        <ul class="list-group">
                            @forelse ($animals as $animal)
                                <div class="gardelis list-group-item">
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
                                    <a class="btn btn-outline-primary" href="{{ route('show', $animal->id) }}">Daugiau</a>
                                    @if(Auth::user()->role > 3 )
                                    <a class="btn btn-outline-success" href="{{ route('edit', $animal) }}">Koreguoti</a>
                                    <form class="trintukas" action="{{ route('delete', $animal) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">Pašalinti</button>
                                    </form>
                                    @endif
                                </div>
                            @empty
                                <span>Kol kas tusčia. Pridėk gyvūnų!</span>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
