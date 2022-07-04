@extends('layout.guest')

@section('title', '| Registrazione')

@section('stili')
<link rel='stylesheet' href="{{ asset('css/reg.css') }}">
<link rel='stylesheet' href="{{ asset('css/style.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/regi.js') }}" defer></script>
<script type="text/javascript">
    const REGISTER_ROUTE = "{{url('register')}}";
</script>
@endsection


@section('content')
<article>
    <section id="container">
    <div id="logo">
    <span><img src="images/logo.jpg" /></span>
    <span><h1>LIBRONLINE</h1></span>
    </div>
   <h2>Presentati</h2>

   <span class="error"></span>
    <main>
        
    <form action="register" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{csrf_token() }}" >

<label for="nome">Nome<input type="text" name="nome" ></label>
      
<label for="cognome">Cognome<input type="text" name="cognome" ></label>
<label for="username">Username<input type="text" name="username" ></label>
<label for="email">Email<input type="text" name="email" ></label>
<label for="password">Password<input type="password" name="password" ></label>
<label for="confermapassword">Conferma Password<input type="password" name="confermapassword" ></label>

<input type="radio" name="genere" value="maschio">maschio
<input type="radio" name="genere" value="femmina">femmina

<br>
<input type="checkbox" name="autorizzo" value="1" >Acconsento all'utilizzo dei dati

<br><br>
<input id="btn" type="submit" name="invio" value="Registrati" disabled>
<br>
<a href="{{url('login')}}" class="login">Hai già un account?Accedi</a>
<br>
<a href="{{url('home')}}" class="login">Torna alla home</a>

</form>

</main>
    </section>


    </article>
@endsection


