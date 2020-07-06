@extends('layouts.app-auth')

@section('content')
<div class="bg-auth">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group mb-4" style="width: 100%">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-0" style="width: 100%">
            <button type="submit" class="btn btn-primary round">
                {{ __('Restablecer de contraseña') }}
            </button>
        </div>
    </form>

</div>
@endsection
