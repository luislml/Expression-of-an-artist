<div class="form-container form-login d-flex align-items-center">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group" style="width: 100%">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group" style="width: 100%">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group" style="width: 100%">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Recuérdame') }}
                </label>
            </div>
        </div>

        <div class="form-group" style="width: 100%">
            <button type="submit" class="btn btn-primary round">
                {{ __('Entrar') }}
            </button>

            @if (Route::has('password.request'))
                <br> &nbsp; <br>
                <a class="link" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>
    </form>
</div>