@extends('layout.guest')

@section('title', '| Index')

@section('stili')
<link rel='stylesheet' href="{{ asset('css/style.css') }}">

<link rel="shortcut icon" href="#">
@endsection


@section('script')
<script src="{{ asset('js/script.js') }}" defer></script>
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
<script type="text/javascript">
    const HOME_ROUTE = "{{url('home')}}";
    const CARRELLO_ROUTE = "{{url('carrello')}}";
</script>
@endsection


@section('content')

@if( session()->has('username')!=true )


    <nav>
        <div id="links">
        <a href="index.php"><img src="images/home.png" /></a>
        <a href="{{url('register')}}">Profilo</a>
        <a href="{{url('login')}}">Carrello</a>
        <a href="{{url('login')}}">Ricerca</a>
        <div id="login">
            <a href="{{url('login')}}"><img src="images/omino.png" /> </a>
           <a href="{{url('login')}}">Login</a>
           <a href="{{url('register')}}">Registrati qui</a>   
        </div>
        </div>
        
    </nav>


@elseif( session()->has('username') )

    <nav>
        <div id="links">
        <a href="{{url('home')}}"><img src="images/home.png" /></a>
        <a href="{{url('profilo')}}">Profilo</a>
        <a href="{{url('carrello')}}">Carrello</a>
        <a href="{{url('ricerca')}}">Ricerca</a>
        <div id="login">
            
           <a id="saluto">Benvenuto {{  session('username')  }} <?php  echo "<BR>".date("y-m-d"); ?></a>
           <a href="{{url('logout')}}">Logout</a>   
        </div>
        </div>
        
    </nav>

@else
@endif

<article>

      <div id="logo">
        <span><img src="images/logo.jpg"/></span>
        <span><h1>LIBRONLINE</h1></span>
      </div>
      <section class="intro">

        
        <div>
          <button id="gen1">Genere 1</button>
          <button id="gen2">Genere 2</button>
          <button id="gen3">Genere 3</button>

        </div>
        
      </section>

     
      <section class="container">

        


      </section>

    </article>
    

    <footer>
        <div id="info">
            <div>Davide Ferrauto</div>
            <div>1000002819</div>
            <div>Università degli studi di Catania</div>
            <div><img src="images/unict.png"   /></div>
        </div>
       
    </footer> 
@endsection


