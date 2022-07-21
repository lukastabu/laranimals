@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ėdalo sąrašas</div>
                    <div class="card-body">
                        <div class="srt-menu">
                            <a class="btn btn-outline-info" href="{{ route('food-index', ['sort' => 'asc']) }}">Sort Ascending</a>
                            <a class="btn btn-outline-info" href="{{ route('food-index', ['sort' => 'desc']) }}">Sort Descending</a>
                            <a class="btn btn-outline-info" href="{{ route('food-index') }}">Reset Sorting</a>
                        </div>

                        <ul class="list-group">
                            @forelse ($foods as $food)
                                <div class="gardelis list-group-item">
                                    Ėdalas: {{ $food->title }}
                                    <br>
                                    Priklauso gyvūnui: {{ $food->takeanimal->name }}
                                    <br>
                                    <a class="btn btn-outline-primary" href="{{ route('food-show', $food->id) }}">Daugiau</a>
                                    @if(Auth::user()->role > 3 )
                                    <a class="btn btn-outline-success" href="{{ route('food-edit', $food) }}">Koreguoti</a>
                                    <form class="trintukas" action="{{ route('food-delete', $food) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">Pašalinti</button>
                                    </form>
                                    @endif
                                </div>
                            @empty
                                <span>Kol kas tusčia. Pridėk ėdalo!</span>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
