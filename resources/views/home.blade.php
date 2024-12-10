<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Quiz</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .home-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
        }

        .banner-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .home-container h1 {
            font-size: 3rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            color: #4CAF50;
        }

        .home-container p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .button-container {
            display: flex;
            gap: 20px;
            flex-direction: row;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
            text-align: center;
        }

        .btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .btn:active {
            background-color: #3e8e41;
            transform: scale(1);
        }
    </style>
</head>
<body>
@include('header')
<div class="home-container">
    <img src="https://img.freepik.com/vecteurs-premium/banniere-temps-quiz-jaune-fond-style-bande-dessinee-pouvant-etre-utilisee-pour-conceptions-promotionnelles_626143-308.jpg" alt="Bannière Quiz" class="banner-image">

    <h1>Bienvenue au Quiz !</h1>
    <p>Testez vos connaissances et apprenez tout en vous amusant.</p>
    <div class="button-container">
        <a href="{{ route('quiz.start') }}" class="btn">Commencer le quiz</a>
        <a href="{{ route('creerQuestion') }}" class="btn">Créer une question</a>
    </div>
</div>
</body>
</html>
