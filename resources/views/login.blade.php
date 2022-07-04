@extends('layout.guest')

@section('title', '| Login')

@section('stili')
<link rel='stylesheet' href="{{ asset('css/style.css') }}">
<link rel='stylesheet' href="{{ asset('css/reg.css') }}">
<link rel="shortcut icon" href="#">
@endsection





@section('content')
<article>
    <section id="container">
    <div id="logo">
    <span><img src="images/logo.jpg" /></span>
    <span><h1>LIBRONLINE</h1></span>
    </div>
   <h2>Login</h2>
             <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
              ?>
    <main>
    <form action="login" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{csrf_token() }}" >

<label>Username<input type="text" name="username" ></label>

<label>Password<input type="password" name="password" ></label>

<input type="submit" name="invio" value="Accedi">
<br>
<a href="{{url('register')}}" class="login">Registrati</a>
<br>
<a href="{{url('home')}}" class="login">Torna alla home</a>

</form>

</main>
    </section>


    </article>
@endsection


