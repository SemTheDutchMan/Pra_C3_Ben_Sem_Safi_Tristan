<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

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
        min-width: fit-content
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

</html>