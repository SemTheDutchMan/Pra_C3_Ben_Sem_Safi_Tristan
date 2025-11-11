<x-base-layout>
    <h1 class="h1-mid">Registreren</h1>

    <form class="form-login" action="{{ route('register.store') }}" method="POST">
        @csrf

        <label for="name">Gebruikersnaam:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <div class="button-login">
            <button type="submit">Registreren</button>
            <a href="{{ route('login') }}">Inloggen</a>
        </div>
    </form>

    <style>
        .h1-mid {
            text-align: center;
        }

        .form-login label,
        .form-login input {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-login input {
            margin-bottom: 15px;
            padding: 8px;
            font-size: 16px;
        }

        .form-login {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            min-width: fit-content;
        }

        .form-login button {
            background-color: black;
            width: 150px;
            height: 40px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-login a {
            background-color: white;
            color: black;
            border: 2px solid black;
            padding: 10px 10px;
            border-radius: 6px;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }
    </style>
</x-base-layout>
