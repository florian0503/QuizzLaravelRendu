<!DOCTYPE html>
@include('header')
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
        .form-container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            margin: 80px auto;
        }
        .form-container h1 {
            margin-bottom: 1rem;
            color: #4CAF50;
        }
        .form-container label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-container input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 0.9em;
            text-align: left;
            margin-bottom: 1rem;
        }
        .form-container p {
            margin-top: 1rem;
        }
        .form-container a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Se connecter</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Champ Email -->
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <p class="error">{{ $errors->first('email') }}</p>
        @endif

        <!-- Champ Mot de passe -->
        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>
        @if ($errors->has('password'))
            <p class="error">{{ $errors->first('password') }}</p>
        @endif

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
</div>
</body>
</html>
