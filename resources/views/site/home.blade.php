@extends('master')
@section('content')
<div id="app">
    <div class="app__image">
        <img loading="lazy" alt="Imagem do filme destaque" src="https://image.tmdb.org/t/p/original/620hnMVLu6RSZW6a5rwO8gqpt0t.jpg" />
    </div>

    <header>
        <img src="{{asset('assets/images/logo.png')}}" alt="Logo da disney plus" />

        <button type="button" class="button__menu" onclick="changeButtonMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="navigation">
            <h2>Movies</h2>

            <ul id="movies">

            </ul>
        </nav>
    </header>

    <main>
        <section class="feature__movie">
            <div class="rating">
                <img src="{{asset('assets/images/logo-imdb.png')}}" alt="Logo da IMDB" />
                <strong></strong>
            </div>

            <!-- DATA DE LANÇAMENTO, CATEGORIA -->
            <span></span>
            <!-- TITULO DO FILME -->
            <h1></h1>
            <!-- SINOPSE DO FILME -->
            <p></p>

            <button type="button">
                <img src="{{asset('assets/images/icon-play.png')}}" alt="Icon play">
                Assistir agora
            </button>
        </section>

    </main>
</div>
@stop