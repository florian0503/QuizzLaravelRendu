<!DOCTYPE html>
<html lang="fr">
@include('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démarrer le Quiz</title>
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

        .start-container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            margin: 80px auto;
        }
        .start-container h1 {
            margin-bottom: 1rem;
            color: #4CAF50;
        }
        .start-container p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        .start-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .start-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="start-container">
    <h1>Bienvenue au Quiz !</h1>
    <p>Testez vos connaissances en répondant aux questions.</p>
    <a href="{{ route('quiz.question', ['index' => 0]) }}">
        <button>Démarrer le Quiz</button>
    </a>
</div>
</body>
</html>
