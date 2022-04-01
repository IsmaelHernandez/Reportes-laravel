@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
      <h1>Nuevo Reporte!</h1>
    </div>
</div>

<div class="row">
    <div class="col">
      <a class="btn btn-primary" href="{{ route('expense.index') }}">Regresar</a>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif
  
<div class="row">
    <div class="col">
        <form action="{{ route('expense.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
            </div>
            <button type="submit" class="btn btn-danger">Guardar</button>
        </form>
    </div>
</div>
@endsection