@extends('layouts.base')
@section('content')
    <div class="div-cadastrar">
        <div style="margin-bottom:5px;y">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <div class="w-form">
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <x-auth-session-status class="alerta-sucesso" :status="session('status')" />

                <input type="email" class="text-field-cadastrar w-input" maxlength="200" name="email" required data-name="email" placeholder="E-MAIL" id="email" value="{{ old('email') }}" required autofocus>
 
                @error('email')
                    <p class="alerta-erro">{{ $message }}</p>
                @enderror

                <input type="submit" value="{{ __('Email Password Reset Link') }}" class="botao-cadastrar w-button" data-wait="por favor aguarde...">
            </form>
        </div>
    </div>

@endsection
