<!DOCTYPE html>
<html lang="fr">
@include('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Terminé</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
        }

        .finish-container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            margin: 80px auto;
        }
        .finish-container h1 {
            margin-bottom: 1rem;
            color: #4CAF50;
        }
        .finish-container p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        .finish-container ul {
            list-style-type: none;
            padding: 0;
        }
        .finish-container li {
            text-align: left;
            margin-bottom: 1rem;
            background: #f8f8f8;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .finish-container li.correct {
            border-left: 4px solid #4CAF50;
        }
        .finish-container li.incorrect {
            border-left: 4px solid #f44336;
        }
        .finish-container a button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .finish-container a button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="finish-container">
    <h1>Félicitations !</h1>
    <p>Vous avez terminé le quiz. Voici un résumé de vos réponses :</p>

    <ul>
        @foreach($results as $result)
            <li class="{{ $result['is_correct'] ? 'correct' : 'incorrect' }}">
                <strong>Question :</strong> {{ $result['question'] }}<br>
                <strong>Résultat :</strong>
                {{ $result['is_correct'] ? 'Bonne réponse ! ✅' : 'Mauvaise réponse ❌' }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('home') }}">
        <button>Retour à l'accueil</button>
    </a>
</div>
</body>
</html>
