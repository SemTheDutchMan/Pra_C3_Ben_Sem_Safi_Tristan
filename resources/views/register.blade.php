<x-base-layout>
    <h1 class="H1">Registreren</h1>

    <form class="form-register" action="{{ route('register.store') }}" method="POST">
        @csrf

        <label for="name">Gebruikersnaam:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <div class="button-register">
            <button type="submit">Registreren</button>
            <a href="login">Inloggen</a>
        </div>
    </form>
</x-base-layout>
