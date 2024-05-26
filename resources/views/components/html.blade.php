<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <!--navbar senza named route
    <nav>
        <ul>
             COME CREARE UN LINK SENZA NAMED ROUTE
            <li><a href="/">HOME</a></li>
            <li><a href="/chi-siamo">CHI SIAMO</a></li>
            <li><a href="/articoli">ARTICOLI</a></li>
        </ul>
    </nav>

-->

    <nav>
        <ul>
            <!-- COME CREARE UN LINK CON NAMED ROUTE -->
            @auth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"
                                onclick="
                event.preventDefault();
                getElementById('form-logout').submit();
                ">Logout</a>
                        </li>
                        <form action="/logout" method="POST" class="d-none" id="form-logout">
                            @csrf
                        </form>


                    </ul>
                </li>
            @else
                <a href="{{ route('register') }}">REGISTRATI</a>

                <a href="{{ route('login') }}">LOGIN</a>
            @endauth


            <li><a href="{{ route('index') }}">HOME</a></li>
            <li><a href="{{ route('chi-siamo') }}">CHI SIAMO</a></li>
            <li><a href="{{ route('contatti') }}">CONTATTACI</a></li>
            <li><a href="{{ route('articoli') }}">ARTICOLI</a></li>
            <li><a href="{{ route('create') }}">CREA ARTICOLO</a></li>
            <li><a href="{{route('categories.index')}}">DASHBOARD</a></li>


        </ul>
    </nav>



    {{ $slot }}

</body>

</html>
