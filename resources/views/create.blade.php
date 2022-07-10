@extends('main')
@section('content')
<div class="gardelis">
<form action="{{route('store')}}" method="POST">
Gyvūnas: <input type="text" name="animal_name" size="12"/>
<br>
Rūšis: <select name="animal_species">
  <option value="1">Žinduolis</option>
  <option value="2">Paukštis</option>
  <option value="3">Žuvis</option>
</select>
<br>
Svoris: <input type="number" name="animal_weight" min="1" max="9999"/>
@csrf
<br>
<button type="submit" class="go-btn">Pridėti</button>
</form>
</div>
@endsection