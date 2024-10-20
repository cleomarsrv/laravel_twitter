@extends('layouts.base')
@section('content')
    <div class="div-cadastrar">
        <div class="w-form">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                {{-- token resetar senha --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                <x-text-input type="hidden" id="email" name="email" class="text-field-cadastrar w-input" :value="old('email', $request->email)"/>

                <p class="cadastre-se">Redefinir senha</p>

                <h5>Email: {{old('email', $request->email)}}</h5>
                                
                <input type="password" class="text-field-cadastrar w-input" name="password" required placeholder="NOVA SENHA" id="password" required autocomplete="new-password" data-name="pass1" onchange="confereSenha()">
                
                <input type="password" class="text-field-cadastrar w-input" name="password_confirmation" required placeholder="CONFIRMAR SENHA" id="password_confirmation" required autocomplete="new-password" data-name="pass2" onchange="confereSenha()">
                
                @error('password')
                    <p class="alerta-erro">{{ $message }}</p>
                @enderror
                
                @error('email')
                    <p class="alerta-erro">{{ $message }}</p>
                @enderror
                
                <input type="submit" value="{{ __('Reset Password') }}" class="botao-cadastrar w-button" data-wait="por favor aguarde...">
                </div>
            </form>

        </div>
    </div>
@endsection
