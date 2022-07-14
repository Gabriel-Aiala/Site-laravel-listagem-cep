@extends('app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1>Adicionar CEP</h1>
    <form action="{{route('salvar')}}" method ="POST">
        @csrf
  <div class="mb-3">
    <label>CEP</label>
    <input type="text" class="form-control" id="cep" name = "cep" aria-describedby="cep"value ="{{$cep}}">
    
  </div>

  <div class="mb-3">
    <label>logradouro</label>
    <input type="text" class="form-control" id="logradouro" name = "logradouro" aria-describedby="logradouro"value ="{{$logradouro}}">
    
  </div>

  <div class="mb-3">
    <label>complemento</label>
    <input type="text" class="form-control" id="complemento" name = "complemento" aria-describedby="complemento"value ="{{$complemento}}">
    
  </div>

  <div class="mb-3">
    <label>bairro</label>
    <input type="text" class="form-control" id="bairro" name = "bairro" aria-describedby="bairro"value ="{{$bairro}}">
    
  </div>

  <div class="mb-3">
    <label>localidade</label>
    <input type="text" class="form-control" id="localidade" name = "localidade" aria-describedby="localidade"value ="{{$localidade}}">
    
  </div>

  <div class="mb-3">
    <label>uf</label>
    <input type="text" class="form-control" id="uf" name = "uf" aria-describedby="uf" value ="{{$uf}}">
    
  </div>

  <div class="mb-3">
    <label>ddd</label>
    <input type="text" class="form-control" id="ddd" name = "ddd" aria-describedby="ddd" value ="{{$ddd}}">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection