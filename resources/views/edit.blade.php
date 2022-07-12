@extends('main')
@section('content')
<h3>Gyvūno koregavimas</h3>
<div class="gardelis">
<form action="{{ route('update', $animal) }}" method="POST">
  <input type="text" name="animal_name" value="{{ $animal->name }}" />
    <select name="animal_species">
    @if ($animal->species == '1')
      <option value="1" selected hidden>Žinduolis</option>
    @elseif ($animal->species == '2')
      <option value="2" selected hidden>Paukštis</option>
    @else
      <option value="3" selected hidden>Žuvis</option>
    @endif
      <option value="1">Žinduolis</option>
      <option value="2">Paukštis</option>
      <option value="3">Žuvis</option>
    </select>
  <br>
  <input type="number" name="animal_weight" min="1" max="9999" value="{{ $animal->weight }}" />
  <br>
  <input type="text" name="animal_house" value="{{ $animal->house }}" />
  <br>
@csrf
@method('put')
  <button type="submit" class="go-btn">Pakeisti</button>
</form>
</div>
@endsection
