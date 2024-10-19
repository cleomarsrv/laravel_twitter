<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Oct 16 2019 23:46:02 GMT+0000 (UTC)  -->
<html data-wf-page="5da786dd00b10d79c698bf04" data-wf-site="5da766d32783b3459dfbc795">
<head>
  <meta charset="utf-8">
  <title>Publicações</title>
  <meta content="Publicações" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">

  {{-- configuracao para o csrf_token funcionar nas requisicoes feitas no scriptTweets.js --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="/css/desafio.webflow.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["PT Sans:400,400italic,700,700italic","Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="/images/webclip.png" rel="apple-touch-icon">
</head>
<body>
  <div class="topo-publicacoes w-clearfix">

    <div class="div-perfil sidebar">
      <p class="nome-perfil">{{ auth()->user()->name }}</p>
      <a class="{{ !$showAll ? 'menu-ativo' : '' }}" href="{{ route('tweets.index', ['show_all' => 0]) }}">Meu Feed</a>
      <a class="{{ $showAll ? 'menu-ativo' : '' }}" href="{{ route('tweets.index', ['show_all' => 1]) }}">Feed Completo</a>
      <a href="{{ route('logout') }}">Sair</a>
    </div>

    <div class="div-feed">
      <div class="container-publicacoes">
        <div class="bloco-publicacao">
          <div class="w-form">

          <form method="POST" action="{{ route('tweets.store') }}" id="email-form" name="email-form" data-name="Email Form">
              @csrf
              <textarea placeholder="O que está acontecendo?" maxlength="255" required id="message" name="message" class="texto-publicar w-input"></textarea>
              <input type="submit" value="Publicar" data-wait="Please wait..." class="botao-publicar w-button">
          </form>

            <div class="w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
        </div>
        <p class="feed">feed</p>
        @forelse ($tweets as $tweet)
        <div class="div-publicacao-feed" id="tweet-{{ $tweet->id }}">
          <div>
            <span class="openUserModal texto-usuario-link" data-id="{{ $tweet->user->id }}">{{ $tweet->user->name }}</span>
            <small class="ml-2 text-sm text-gray-600">{{'publicado '}}{{$tweet->created_at->format('d/m/Y H:i') }}</small>
          </div>
          <p class="texto-publicacao">{{ $tweet->message }}</p>
          @foreach ($tweet->comentarios as $comentario)
          <div class="div-comentario-existente">
            <div>
              <span class="openUserModal nome-perfil-comentario" data-id="{{ $comentario->user->id }}">{{ $comentario->user->name }}</span>
              <small class="ml-2 text-sm text-gray-600"> {{'comentado '}}{{$comentario->created_at->format('d/m/Y H:i')}}</small>
            </div>
            <p class="comentario">{{ $comentario->comentario }}</p>
          </div>
          @endforeach
          
          <div class="w-form">
              
              <form action="{{ route('comentarios.store') }}" method="POST" id="email-form-2" name="email-form-2" data-name="Email Form 2" class="w-clearfix">
                @csrf
                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                <textarea name="comentario" placeholder="comente esta publicação" required maxlength="5000" id="field-2" class="textarea w-input"></textarea>
                <input type="submit" value="comentar" data-wait="Please wait..." class="submit-button w-button">
                @if ($errors->any())
                <div class="alerta-erro">
                  @foreach ($errors->all() as $error)
                      {{ $error }}
                  @endforeach
                </div>
                @endif
              </form>
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
              </div>
            </div>
        </div>

        @empty
        <div class="texto-publicacao">
          <p>Nada por aqui. Publique algo ou siga alguém interessante.</p>
        </div>
        @endforelse
      </div>      
    </div>
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalName">Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <span id="modalEmail">email</span>       
                  </div>
                  <div class="modal-footer">
                    <button class="botao-deseguir" id="modalBtnSeguir">Desseguir</button>
                  </div>
                </div>
              </div>
            </div>

    <div class="div-usuarios">
        @foreach ($users as $user)
          @if (auth()->user()->id !== $user->id)
          <div class="div-botao">
            <div class="div-dados-usuario">
              <p class="texto-usuario-nome">{{ $user->name }}</h4>
              <p class="texto-email">{{ $user->email }}</h4>
            </div>
              
            @if (auth()->user()->followings()->where('user_id', $user->id)->exists())
              <form  method="POST" action="{{ route('users.unfollow', $user->id) }}">
              @csrf
                <button type="submit" class="botao-deseguir">Desseguir</button>
              </form>
            @else
              <form  method="POST" action="{{ route('users.follow', $user->id) }}">
              @csrf
                <button type="submit" class="botao-seguir">seguir</button>
              </form>
            @endif
          </div>
          @endif
        @endforeach
    </div>

  </div>
  <div class="w-embed">
    <style>
     .w-webflow-badge {display: none !important;}
    </style>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/webflow.js" type="text/javascript"></script>
  <script src="/js/scriptTweets.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>