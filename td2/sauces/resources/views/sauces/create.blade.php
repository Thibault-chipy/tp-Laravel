@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col
            -md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title
                        fw-semibold text-center">Ajoutez une nouvelle sauce </h2>
                        <form action="{{ route('sauces.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Fabricant</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="piment" class="form-label">Piment principal</label>
                                <input type="text" class="form-control" id="piment" name="piment" required>
                            </div>

                            <div class="mb-3">
                                <label for="heat" class="form-label">Piquant</label>
                                <input type="number" class="form-control" id="heat" name="heat" required>
                            </div>
                            <input type="hidden" id="userId" name="userId" value="{{ Auth::id() }}">
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection