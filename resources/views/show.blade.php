@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tavo gyvūnas</div>
                    <div class="card-body">
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
                                @if(Auth::user()->role > 3 )
                                <br>
                                <a class="btn btn-outline-success" href="{{ route('edit', $animal) }}">Koreguoti</a>
                                <form class="trintukas" action="{{ route('delete', $animal) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Pašalinti</button>
                                </form>
                                @endif
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
