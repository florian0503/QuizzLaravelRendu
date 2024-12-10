<!DOCTYPE html>
<html lang="fr">
@include('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Question - Quiz</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <style>
        input[type="checkbox"] {
            margin-top: 10px;
            width: 20px;
            height: 20px;
            accent-color: #4CAF50;
        }
        .answers {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Créer une question</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="questionForm" method="POST" action="{{ route('creerQuestion.store') }}">
    @csrf
        <label for="titre">Titre de la question :</label>
        <input type="text" name="titre" id="titre" required>

        <h3>Réponses :</h3>
        @for($i = 0; $i < 4; $i++)
            <div class="answers">
                <label for="reponse{{ $i }}">Réponse {{ $i + 1 }} :</label>
                <input type="text" name="reponses[{{ $i }}][texte]" id="reponse{{ $i }}" required>

                <label for="correct{{ $i }}">Correcte :</label>
                <input type="checkbox" name="reponses[{{ $i }}][est_correcte]" id="correct{{ $i }}" class="correct-checkbox" value="0">
            </div>
        @endfor

        <button type="submit">Enregistrer</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('questionForm').addEventListener('submit', function(event) {
            const checkboxes = document.querySelectorAll('.correct-checkbox');
            let isChecked = false;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });

            if (!isChecked) {
                event.preventDefault();
                alert('Veuillez sélectionner au moins une réponse correcte.');
            }
        });
    });
</script>

</body>
</html>
