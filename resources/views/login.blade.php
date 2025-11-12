<x-base-layout>

<body>
    <h1 class="h1-mid">Inloggen</h1>

    <form class="form-login">
        <label for="email">Gebruikersnaam:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <div class="button-login">
            <button type="submit">Log in</button>
            <a href="register">Registreren</a>
        </div>
    </form>
</body>

</x-base-layout>