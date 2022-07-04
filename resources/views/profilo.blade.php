@extends('layout.guest')

@section('title', '| Profilo')

@section('stili')
<link rel='stylesheet' href="{{ asset('css/style.css') }}">
<link rel='stylesheet' href="{{ asset('css/reg.css') }}">
<link rel="shortcut icon" href="#">
@endsection


@section('script')
<script src="{{ asset('js/profil.js') }}" defer></script>
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
<script type="text/javascript">
    const PROFILO_ROUTE = "{{url('profilo')}}";
</script>
@endsection


@section('content')


   

    <article>
    <section id="container">
    <div id="logo">
    <span><img src="images/logo.jpg" /></span>
    <span><h1>LIBRONLINE</h1></span>
    </div>
   <h2>Informazioni personali</h2>
    <main id="profilo">
        
    
    
<label>Nome<input type="text" name="nome" value="{{$row->nome}}"  disabled></label>
<label>Cognome<input type="text" name="cognome"  value="{{$row->cognome}}" disabled></label>
<label>Username<input type="text" name="username"  value="{{$row->username}}" disabled></label>
<label>Email<input type="text" name="email"  value="{{$row->email}}" disabled></label>
<label>sesso<input type="text" name="sesso"  value="{{$row->sesso}}" disabled></label>
<label>Password<input type="password" id="password"  value="{{$row->password}}" disabled></label>
<button id="mostra">Mostra password</button>

<br><br>
<a href="{{url('home')}}" class="login">Torna alla home</a>



</main>
    </section>


    </article>



@endsection


