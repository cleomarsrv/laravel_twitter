@extends('layouts.main')

@section('title', 'Twitter')
@section('content')
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-9 image-section">
                <!-- Imagem será definida via CSS -->
            </div>

            <div class="col-12 col-md-3 button-section">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAccountModal">
                    Criar Conta
                </button>
                <button type="button" class="btn btn-secondary">Logar</button>
            </div>
        </div>
    </div>

<div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="createAccountModalLabel">Criar Conta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulário de criar conta -->
        <form method="POST" action="{{ route('register') }}">
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Digite seu nome">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha">
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme sua senha">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Criar Conta</button>
      </div>
    </div>
  </div>
</div>

@endsection
