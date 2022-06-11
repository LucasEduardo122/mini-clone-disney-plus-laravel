<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DisneyPlus Clone</title>
    <meta name="description" content="Plataforma do disney plus" />

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/jpg" href="{{asset('assets/images/favicon.ico')}}" />

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <!-- *currently set to "Roboto". Feel free to change it to whatever you like* -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!--STYLES -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/movie.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/movies.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navigation.css')}}">
</head>

<body>
    @yield('content')

    <!--<script src="{{asset('assets/js/index.js')}}"></script>-->

    <script>
        const BASE_URL_IMAGE = {
            original: 'https://image.tmdb.org/t/p/original',
            small: 'https://image.tmdb.org/t/p/w500'
        }

        const movies = []
        const moviesElement = document.getElementById('movies')

        function changeButtonMenu() {
            const button = document.querySelector('.button__menu')
            const navigation = document.querySelector('.navigation')

            console.log(movies)


            button.classList.toggle('active')
            navigation.classList.toggle('active')
        }

        function setMainMovie(movie) {
            const appImage = document.querySelector('.app__image img')
            const title = document.querySelector('.feature__movie h1')
            const description = document.querySelector('.feature__movie p')
            const info = document.querySelector('.feature__movie span')
            const rating = document.querySelector('.rating strong')


            title.innerHTML = movie.title
            description.innerHTML = movie.overview
            rating.innerHTML = movie.vote_average
            info.innerHTML = movie.release + ' - ' + movie.genre + ' - Movie'

            appImage.setAttribute('src', movie.image.original)
        }

        function changeMainMovie(movieId) {
            const movie = movies.find(movie => movie.id === movieId)

            setMainMovie(movie)
            changeButtonMenu()
        }

        function createButtonMovie(movieId) {
            const button = document.createElement('button')
            button.setAttribute('onclick', `changeMainMovie('${movieId}')`)
            button.innerHTML = '<img src="assets/images/icon-play-button.png" alt="Icon play button" />'

            return button
        }

        function createImageMovie(movieImage, movieTitle) {
            const divImageMovie = document.createElement('div')
            divImageMovie.classList.add('movie__image')

            const image = document.createElement('img')

            image.setAttribute('src', movieImage)
            image.setAttribute('alt', `Imagem do filme ${movieTitle}`)
            image.setAttribute('loading', 'lazy')

            divImageMovie.appendChild(image)

            return divImageMovie
        }

        function addMovieInList(movie) {
            const movieElement = document.createElement('li')
            movieElement.classList.add('movie')

            const genre = `<span>${movie.genre}</span>`
            const title = `<strong>${movie.title}</strong>`

            movieElement.innerHTML = genre + title
            movieElement.appendChild(createButtonMovie(movie.id))
            movieElement.appendChild(createImageMovie(movie.image.small, movie.title))

            moviesElement.appendChild(movieElement)
        }

        function loadMovies() {
            
            const LIST_MOVIES = [<?php 
            for($c = 0; $c < count($filmes); $c++) {
                echo $filmes[$c] .',';
            }?>]


            LIST_MOVIES.map((movie, index) => {

                const movieData = {
                    id: movie.imdb_id,
                    title: movie.title,
                    overview: movie.overview,
                    vote_average: movie.vote_average,
                    genre: movie.genres[0].name,
                    release: movie.release_date.split('-')[0],
                    image: {
                        original: BASE_URL_IMAGE.original.concat(movie.backdrop_path),
                        small: BASE_URL_IMAGE.small.concat(movie.backdrop_path),
                    }
                }

                movies.push(movieData)

                if (index === 0) {
                    setMainMovie(movieData)
                }

                addMovieInList(movieData)
            })
        }

        loadMovies()
    </script>
</body>

</html>