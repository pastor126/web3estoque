
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Estoque MVC LV</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-static/">





<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      body {
        min-height: 75rem;
      }
    </style>


  </head>
  <body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('produto/listar')}}">ESTOQUE</a>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">

      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('compra/listar')}}">COMPRAS</a>
      </li>
      @auth
      <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="{{url('tipo/listar')}}" >Tipo</a>
      </li>  
      
        <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="{{url('fabricante/listar')}}" >Fabricante</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="{{url('forma_pag/listar')}}">Formas de Pagamento</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="{{url('cliente/listar')}}">Clientes</a>
        </li>
        @endauth
    </ul>
    <ul class="navbar-nav">
    @guest
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">Login</a>
            </li>
        @endguest
 
      <li class="navbar-item dropdown">
    @auth
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                </form>
            </li>
        </ul>
    @endauth
</li>

      
   


      </ul>
    </div>
  </div>
</nav>

<main style="padding-top: 0px;"  class="container">
  <div class="bg-light p-1 rounded">
  @yield('conteudo')
  </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  </body>
</html>