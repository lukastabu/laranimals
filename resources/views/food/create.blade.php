@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kuriamas naujas ėdalas</div>
                    <div class="card-body">
                        <div class="gardelis">
                            <form action="{{ route('food-store') }}" method="POST">
                                Ėdalas: <input type="text" name="food_title" size="12" />
                                <br>
                                Kam skirtas Ėdalas:
                                <select name="animal_id">
                                    @foreach ($animals as $animal)
                                        <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Pridėti</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
