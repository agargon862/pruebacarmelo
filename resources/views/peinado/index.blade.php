@extends('App.bootstrap.template')

@section('content')




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
            <td><a href="{{route('peinado.show', $peinado ->id)}}" class="btn btn-success btn-sm">Show</a></td>
            <td><a href="{{route('peinado.edit', $peinado ->id )}}" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="{{route('peinado.destroy', $peinado ->id )}}" class="btn btn-success btn-sm">Destroy</a></td>

        </tr>
        @endforeach
    </tbody>

    <th>
    
    </th>

    <tfoot>
        <tr>
            <th colspan="2">Numero de peinados</th>
            <th>{{ 127 }}</th>
        </tr>
    </tfoot>
</table>

@endsection