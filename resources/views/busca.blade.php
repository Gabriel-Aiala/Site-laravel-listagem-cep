@extends('app')
@section('content')
    <form action="{{route('buscar')}}" method ="GET">
        @csrf
  <div class="mb-3">
    <label>CEP</label>
    <input type="text" class="form-control" id="cep" name = "cep" aria-describedby="cep">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection