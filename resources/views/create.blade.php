@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gyvūno kūrimas</div>

                    <div class="card-body">
                        <div class="gardelis">
                            <form action="{{ route('store') }}" method="POST">
                                Gyvūnas: <input type="text" name="animal_name" size="12" />
                                <br>
                                Rūšis: <select name="animal_species">
                                    <option value="1">Žinduolis</option>
                                    <option value="2">Paukštis</option>
                                    <option value="3">Žuvis</option>
                                </select>
                                <br>
                                Svoris: <input type="number" name="animal_weight" min="1" max="9999" />
                                <br>
                                Būstas: <input type="text" name="animal_house" size="12" />
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
