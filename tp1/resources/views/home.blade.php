@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-footer">
                    <a href="{{ route('session.show', ['id' => Auth::user()->id]) }}" class="btn btn-primary">
                        {{ __('Voir sa sessions') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
