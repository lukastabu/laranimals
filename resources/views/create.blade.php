@extends('main')
@section('content')
{{-- <ul> --}}
<form action="{{route('store')}}" method="POST">
<input type="text" name="animal_name"/>
<select name="animal_species">
  <option value="1">Žinduolis</option>
  <option value="2">Paukštis</option>
  <option value="3">Žuvis</option>
</select>
<input type="number" name="animal_weight" min="1" max="9999"/>
@csrf
<button type="submit">Pridėti gyvūnų</button>
</form>
{{-- </ul> --}}
@endsection