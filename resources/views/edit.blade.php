@extends('main')
@section('content')
{{-- <ul> --}}
<form action="{{route('update', $animal)}}" method="POST">
<input type="text" name="animal_name" value={{$animal->name}}/>
<select name="animal_species value={{$animal->species}}">
  <option value="1">Žinduolis</option>
  <option value="2">Paukštis</option>
  <option value="3">Žuvis</option>
</select>
<input type="number" name="animal_weight" min="1" max="9999 value={{$animal->weight}}"/>
@csrf
@method('put')
<button type="submit">Pakeisti gyvūną</button>
</form>
{{-- </ul> --}}
@endsection