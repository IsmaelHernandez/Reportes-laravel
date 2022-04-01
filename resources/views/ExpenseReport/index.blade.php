@extends('layouts.base')

@section('content')
<div class="row">
  <div class="col">
    <h1>Reportes!</h1>
  </div>
</div>

<div class="row">
  <div class="col">
    <a class="btn btn-primary" href="{{route('expense.create')}}">Crear Reporte</a>
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
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Titulo</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody>
        @isset($expend)
        @foreach ($expend as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->titulo}}</td>
          <td>
            <form action="{{ route('expense.destroy', $item->id)}}" method="POST">   
              {{-- <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>     --}}
              <a class="btn btn-info" href="{{ route('expense.edit',$item->id) }}">Editar Reporte</a>   
              @csrf
              @method('DELETE')      
              <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
          </td>
        </tr>
        @endforeach
        @endisset
      </tbody>
    </table>
  </div>
</div>
  
@endsection