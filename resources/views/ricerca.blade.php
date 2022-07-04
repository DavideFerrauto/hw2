@extends('layout.guest')

@section('title', '| Ricerca')

@section('stili')
<link rel='stylesheet' href="{{ asset('css/stylericerca.css') }}">
<link rel='stylesheet' href="{{ asset('css/provided-style.css') }}">
<link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="#">
@endsection


@section('script')
<script src="{{ asset('js/constants.js') }}" defer></script>
<script src="{{ asset('js/scriptricerca.js') }}" defer></script>
<script src="{{ asset('js/api.js') }}" defer></script>
<script src="{{ asset('js/prefer.js') }}" defer></script>

<script type="text/javascript">
    const RICERCA_ROUTE = "{{url('ricerca')}}";
</script>
@endsection


@section('content')


 
<body>
  <article>
    <header>
        <h1>LIBRONLINE</h1>
        <div>
        <a href="{{url('home')}}"><img src="images/home.png" /></a>
          
        </div>
    </header>
    <h1>Test del Lettore</h1>

    <section id="modal-view" class="hidden">

    </section>

    <section class="question-name">
      <h1> Quale di questi libri conosci meglio:</h1>
    </section>

    <section class="choice-grid">
     
      <div data-choice-id="blep" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/51+O6+BisCL.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="happy" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/51YuFod+3FL._SL500_.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="sleeping" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/51rdksF61YL.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="dopey" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/51iy7u+yklL.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="burger" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/51C70ZMHsxL.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="cart" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/51rbcw7whpL.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="nerd" data-question-id="one">
        <img src="https://m.media-amazon.com/images/I/5126p5+amYL.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="shy" data-question-id="one">
        <img src="https://images-na.ssl-images-amazon.com/images/I/41nCMv1dd4L._SY498_BO1,204,203,200_.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="sleepy" data-question-id="one">
        <img src="https://i1.sndcdn.com/artworks-BPzs8NcoWCOdk1Pv-EJ5sHQ-t500x500.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>
    </section>

    <form>
      Cerca un altro libro se non ne conosci nessuno
      <input type="text" id="libro">
      <input type="submit" id="submit" value="Cerca">

    </form>

    <section id="library-view">
    
    </section>

    <!--  -------------------------------->

    <section class="question-name">
      <h1> Quale di questi libri ti piace di più:</h1>
    </section>

    <section class="choice-grid">
      <div data-choice-id="blep" data-question-id="two">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2015/10/it.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="happy" data-question-id="two">
        <img src="https://www.iperdeal.com/files/archivio_Files/Foto/1409_2.PNG"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="sleeping" data-question-id="two">
        <img src="https://www.mescalina.it/foto/libri/recensioni/big/736--20181109174547.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="dopey" data-question-id="two">
        <img src="https://m.media-amazon.com/images/I/51uf6hRTxGL._SL500_.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="burger" data-question-id="two">
        <img src="https://img.sheetmusic.direct/catalogue/product/hl-00450057-lg.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="cart" data-question-id="two">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2015/10/king.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="nerd" data-question-id="two">
        <img src="https://www.woodbrass.com/it-it/images/SQUARE400/woodbrass/EP3562.JPG"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="shy" data-question-id="two">
        <img src="https://www.hangarstore.it/files/hangar_Files/Foto/72521_5.PNG"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="sleepy" data-question-id="two">
        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1579000185i/50483827._UY500_SS500_.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>
    </section>

    
    <form name ='search_content' id='search_content'>
        Cerca brani collegati a un libro  
        <input type="text" id="libro2">
        <input type="submit" id="submit2" value="Cerca">

      </form>

      <section id="library-view2">
      
      </section>

    <!------------------------------------->



    <section class="question-name">
      <h1>Quale di questi libri ti incuriosisce maggiormente:</h1>
    </section>

    <section class="choice-grid">
      <div data-choice-id="blep" data-question-id="three">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2018/12/manzoni.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="happy" data-question-id="three">
        <img src="https://1.bp.blogspot.com/-I5KHziirn2k/VhqxAWVKRwI/AAAAAAAAJFI/-liv9aq2XlY/s1600/il%2Bsegreto%2Bgreenshore%2Bcover-min.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="sleeping" data-question-id="three">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2019/07/verne.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="dopey" data-question-id="three">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2019/07/levi3.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="burger" data-question-id="three">
        <img src="https://www.namaste-shop.it/25853-home_default/il-mito-e-l-astrologia-psicologica-libro.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="cart" data-question-id="three">
        <img src="https://cdn.gelestatic.it/repubblica/design/2017/03/1467704702289_1-ungiardinosemplice.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="nerd" data-question-id="three">
        <img src="https://2.bp.blogspot.com/-7YjPHcxocgY/VhqvdOmxTQI/AAAAAAAAJE0/yarTuGTmc-s/s1600/Lo%2Bscroccone%2Bcover-min.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="shy" data-question-id="three">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2015/10/rosemarys-baby.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>

      <div data-choice-id="sleepy" data-question-id="three">
        <img src="https://cdn.gelestatic.it/kataweb/ilmiolibro/2019/07/murgia.jpg"/>
        <img class="checkbox" src="images/unchecked.png"/>
      </div>
    </section>
    <section id="esito">
        <h1 id="title"></h1>
        <div id="contents">

        </div>
        <button >
          Ricomincia quiz
        </button>
    </section>
  </article>
</body>


@endsection


