<!DOCTYPE html>
<html lang="fr">
@include('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question {{ $index + 1 }} / {{ $totalQuestions }}</title>
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
        .question-container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            margin: 80px auto;
        }
        .question-container h1 {
            margin-bottom: 1rem;
            color: #4CAF50;
        }
        .question-container p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        .question-container form {
            text-align: left;
        }
        .question-container div {
            margin-bottom: 1rem;
        }
        .question-container input[type="checkbox"] {
            margin-right: 10px;
        }
        .question-container button {
            margin-top: 1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 100%;
        }
        .question-container button:hover {
            background-color: #45a049;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin-top: 20px;
        }
        .progress-bar-filled {
            height: 100%;
            background-color: #4CAF50;
            width: {{ ($index + 1) / $totalQuestions * 100 }}%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="question-container">
    <h1>Question {{ $index + 1 }} sur {{ $totalQuestions }}</h1>
    <p>{{ $question->titre }}</p>

    <form method="POST" action="{{ route('quiz.answer') }}" id="quiz-form">
        @csrf
        <input type="hidden" name="index" value="{{ $index }}">

        @foreach($question->reponses as $reponse)
            <div>
                <input type="checkbox" name="reponses[]" value="{{ $reponse->id }}" class="checkbox-reponse">
                <label>{{ $reponse->texte }}</label>
            </div>
        @endforeach

        <button type="submit">Valider</button>
    </form>

    <div class="progress-bar">
        <div class="progress-bar-filled"></div>
    </div>
</div>

<script>
    document.getElementById('quiz-form').addEventListener('submit', function(event) {
        const checkboxes = document.querySelectorAll('.checkbox-reponse');
        let isChecked = false;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            alert('Veuillez cocher au moins une réponse avant de valider.');
            event.preventDefault();
        }
    });
</script>
</body>
</html>
