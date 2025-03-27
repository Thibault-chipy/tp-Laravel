@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Card contenant les informations détaillées de la sauce -->
                <div class="card">
                    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                    <img src="{{ asset($sauce->imageUrl) }}" alt="{{ $sauce->name }}" class="card-img-top" style="height: 650px; width: 100%;">
                    <div class="card-body">
                        <h2 class="card-title fw-semibold text-center">{{ strtoupper($sauce->name) }}</h2>
                        <p class="text-muted text-center">Fabricant : {{ $sauce->manufacturer }}</p>
                        
                        <div class="mt-3">
                            <h5>Description</h5>
                            <p>{{ $sauce->description }}</p>
                        </div>
                        
                        <div class="mt-3">
                            <p class="text-muted">Piquant: {{ $sauce->heat }}/10</p>
                        </div>

                        <div class="mt-3">
                            <p class="text-muted
                            ">Piment principal: {{ $sauce->mainPepper }}</p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('sauces.react',[$sauce->idSauce,'like']) }}" class="btn btn-secondary">
                                     <i class="fas fa-thumbs-up"></i> {{ $likes }}
                                </a>

                                <a href="{{ route('sauces.react',[$sauce->idSauce,'dislike']) }}" class="btn btn-secondary">
                                    <i class="fas fa-thumbs-down"></i> {{ $dislikes }}
                                </a>
                            </div>
                        </div>                      
                             <div class="text-center mt-4">
                            <a href="{{ route('sauces.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    
                        @auth
                            @if(Auth::user()->idUser === $sauce->user_id)
                                <div class="d-flex justify-content-center mt-3 gap-2">
                                    <a href="{{ route('sauces.edit', $sauce->idSauce) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i> Modifier
                                    </a>
                                    
                                    <form action="{{ route('sauces.destroy', $sauce->idSauce) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sauce?')">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection