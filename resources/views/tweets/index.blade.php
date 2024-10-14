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
  <link href="/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="/css/desafio.webflow.css" rel="stylesheet" type="text/css">
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
      <a class="{{ !$showAll ? 'menu-ativo' : '' }}" href="{{ route('tweets.index') }}">Meu Feed</a>
      <a class="{{ $showAll ? 'menu-ativo' : '' }}" href="{{ route('tweets.index', ['show_all' => 1]) }}">Feed Completo</a>
      <a href="{{ route('logout') }}">Sair</a>
    </div>

    <div class="div-feed">
      <div class="container-publicacoes">
        <div class="bloco-publicacao">
          <div class="w-form">

          <form method="POST" action="{{ route('tweets.store') }}" id="email-form" name="email-form" data-name="Email Form">
              @csrf
              <textarea placeholder="O que está acontecendo?" maxlength="5000" id="message" name="message" class="texto-publicar w-input"></textarea>
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
        <div class="div-publicacao-feed">
          <div>
            <span class="text-gray-800">{{ $tweet->user->name }}</span>
            <small class="ml-2 text-sm text-gray-600">{{'publicado '}}{{$tweet->created_at->format('d/m/Y H:i') }}</small>
          </div>
          <p class="texto-publicacao">{{ $tweet->message }}</p>
          @foreach ($tweet->comentarios as $comentario)
          <div class="div-comentario-existente">
            <div>
              <span class="nome-perfil-comentario">{{ $comentario->user->name }}</span>
              <small class="ml-2 text-sm text-gray-600"> {{'comentado '}}{{$comentario->created_at->format('d/m/Y H:i')}}</small>
            </div>
            <p class="comentario">{{ $comentario->comentario }}</p>
          </div>
          @endforeach

            <div class="w-form">
              
              <form action="{{ route('comentarios.store') }}" method="POST" id="email-form-2" name="email-form-2" data-name="Email Form 2" class="w-clearfix">
                @csrf
                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                <textarea name="comentario" placeholder="comente esta publicação" maxlength="5000" id="field-2" class="textarea w-input"></textarea>
                <input type="submit" value="poste seu comentario" data-wait="Please wait..." class="submit-button w-button">
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
          <p>Nada por aqui. Publique algo ou siga usuários interessantes.</p>
        </div>
        @endforelse
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
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>