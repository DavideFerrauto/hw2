@extends('layout.guest')

@section('title', '| Carrello')

@section('stili')
<link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
<link rel='stylesheet' href="{{ asset('css/provided-style.css') }}">
<link rel="shortcut icon" href="#">
@endsection


@section('script')
<script src="{{ asset('js/scriptcarrello.js') }}" defer></script>
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
<script type="text/javascript">
    const CARRELLO_ROUTE = "{{url('carrello')}}";
</script>
@endsection


@section('content')


   

  <article>
    <header>
        <h1>LIBRONLINE</h1>
        <div>
        <a href="{{url('home')}}"><img src="images/home.png" /></a>
          
        </div>
    </header>
    <h1>Il carrello di  {{  session('username')  }}    </h1>

    <section class="container">

        


  </section>

   

    

    <!--  -------------------------------->

  </article>



@endsection


