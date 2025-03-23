@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title fw-semibold text-center">Modifier la sauce {{ $sauce->name }}</h2>  
                        <form action="{{ route('sauces.update', $sauce->idSauce) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $sauce->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Fabricant</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $sauce->manufacturer }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $sauce->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="piment" class="form-label">Piment principal</label>
                                <input type="text" class="form-control" id="piment" name="piment" value="{{ $sauce->mainPepper }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="heat" class="form-label">Piquant</label>
                                <div class="d-flex align-items-center">
                                    <input type="range" class="form-range" id="heat" name="heat" min="1" max="10" value="{{ $sauce->heat }}" required>
                                    <span class="ms-2" id="heatValue">{{ $sauce->heat }}</span>
                                </div>
                                <script>
                                    document.getElementById('heat').addEventListener('input', function() {
                                        document.getElementById('heatValue').textContent = this.value;
                                    });
                                </script>
                            </div>
                            <input type="hidden" id="userId" name="userId" value="{{ Auth::id() }}">
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection