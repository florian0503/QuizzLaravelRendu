<!-- resources/views/layouts/header.blade.php -->
<link href="{{ asset('style.css') }}" rel="stylesheet">
<header>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}">Quiz App</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="{{ route('creerQuestion') }}">Créer une question</a></li>
                    <li><a href="{{ route('quiz.start') }}">Commencer le quiz</a></li>
                    @if(Auth::check())
                        <li><form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Déconnexion</button>
                            </form></li>
                    @else
                        <li><a href="{{ route('register') }}">S'inscrire</a></li>
                        <li><a href="{{ route('login') }}">Se connecter</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
