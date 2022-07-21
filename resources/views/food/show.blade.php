@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tavo Gyvūnas</div>
                    <div class="card-body">
                        <div class="gardelis">
                            Ėdalas: {{ $food->title }}
                            <br>
                            Priklauso gyvūnui: {{ $food->takeanimal->name }}
                            @if(Auth::user()->role > 3 )
                            <br>
                            <a class="btn btn-outline-success" href="{{ route('food-edit', $food) }}">Koreguoti</a>
                            <form class="trintukas" action="{{ route('food-delete', $food) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Pašalinti</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
