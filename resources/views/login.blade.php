<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form method="POST" action="/login">
        @csrf

        <label for="email">documento:</label>
        <input type="text" name="email" id="email" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <br>

        <button type="submit">Login</button>
    </form>
</body>

</html>