@extends('App.bootstrap.template')

@section('content')

<!-- Ventanas modales principio -->

<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="destroyModalLabel">Confirm delete hairstyle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="destroyModalContent">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button form= "form-delete" type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Ventanas modales fin -->



<table class="table table-hover">
    
    <thead>
        <tr>
            <th>#</th>
            <th>Author</th>
            <th>Hair Type</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($peinados as $peinado)
        <tr>
            <td>{{ $peinado->id }}</td>
            <td>{{ $peinado->author }}</td>
            <td>{{ $peinado->hair_type }}</td>
        <td>
    <a href="{{route('peinado.show', $peinado->id)}}" class="btn btn-success btn-sm">Show</a>
    <a href="{{route('peinado.edit', $peinado->id)}}" class="btn btn-warning btn-sm">Edit</a>
    <button class="btn btn-danger btn-sm" 
            data-bs-toggle="modal" 
            data-bs-target="#destroyModal"
            data-peinado="{{$peinado->name}}"
            data-href="{{route('peinado.destroy', $peinado->id)}}">
        Delete
    </button>
</td>

        </tr>
        @endforeach
    </tbody>

    <th>
    
    </th>

    <tfoot>
        <tr>
            <th colspan="2">Numero de peinados</th>
            <th>{{ count($peinados) }}</th>
        </tr>
    </tfoot>
    
</table>
<form action="" method="POST" id="form-delete">
    @csrf
    @method('delete')

    <input class="btn btn-primary" value="Delete hairstyle" type="submit">

    
</form>

<script src="assets/js/main.js"></script>
@endsection