@extends('App.bootstrap.template')

@section('content')

<main class="px-3">
    
        <h1>{{ $peinado->name }}</h1>
        <p class="lead">{{ $peinado->description }}</p>
        <p><strong>Autor:</strong> {{ $peinado->author }}</p>
        <p><strong>Tipo de cabello:</strong> {{ $peinado->hair_type }}</p>
        <p><strong>Precio:</strong> ${{ $peinado->price }}</p>
        
        
        <img src="{{ $peinado->getPath() }}" width="30%" class="img-fluid">
        
        <p class="lead">
            <a href="{{ route('peinado.index') }}" class="btn btn-lg btn-light fw-bold border-white bg-white">
                Volver
            </a>
        </p>
    
        
    
</main>

@endsection