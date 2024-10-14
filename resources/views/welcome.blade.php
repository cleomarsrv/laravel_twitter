<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Oct 16 2019 23:46:02 GMT+0000 (UTC)  -->
<html data-wf-page="5da766d32783b34770fbc796" data-wf-site="5da766d32783b3459dfbc795">
<head>
  <meta charset="utf-8">
  <title>Desafio</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/desafio.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["PT Sans:400,400italic,700,700italic","Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">
    @if (session()->has('success'))
        {{ session()->get('success') }} 
    @endif
    
    @if (auth()->check())
        Ja logado {{ auth()->user()->firstName }}  | <a href="{{ route('login.destroy') }}">logout</a>
    @endif
    
    @error('error')
        <span>{{ $message }}</span>
    @enderror
  <div class="topo">
    <div class="container w-clearfix">
    <div class="div-azul"></div>
      <div class="div-formulario">
        <div class="div-entrar">
          <div class="w-form">

            <form method="POST" action="{{ route('login.store') }}" id="email-form" name="email-form" data-name="Email Form" class="w-clearfix">
                @csrf
                <div class="div-text-field w-clearfix">
                    <input type="email" maxlength="256" placeholder="E-MAIL" id="email" name="email" required class="text-field-entrar margem-right w-input">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                    <input type="password" maxlength="256" placeholder="SENHA" id="password" name="password" required class="text-field-entrar w-input">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                    <a href="#" class="link-esqueceu-sua-senha">Esqueceu sua senha?</a>
                </div>
                <input type="submit" value="ENTRAR" data-wait="Please wait..." class="botao-entrar w-button">
            </form>


            <div class="w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
        </div>
        <div class="div-cadastrar">
          <p class="cadastre-se">cadastre-se</p>
          <div class="w-form">

            <form method="POST" action="{{ route('cadastrar') }}" id="email-form-2" name="email-form-2" data-name="Email Form 2">
              @csrf
              <input type="text" class="text-field-cadastrar w-input" maxlength="100" name="name" data-name="Name" placeholder="NOME" id="name">
              <input type="email" class="text-field-cadastrar w-input" maxlength="256" name="email" data-name="Name 2" placeholder="E-MAIL" id="email">
              <input type="password" class="text-field-cadastrar w-input" maxlength="256" name="password" data-name="Name 3" placeholder="SENHA" id="password">
              <input type="password" class="text-field-cadastrar w-input" maxlength="256" name="password_confirmation" data-name="Name 3" placeholder="CONFIRMAR SENHA" id="password_confirmation">
              <input type="submit" value="CADASTRAR" data-wait="Please wait..." class="botao-cadastrar w-button">
            </form>

            <div class="w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
        </div>
      </div>
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