<!DOCTYPE html>
<html>
<head>
    <title>Fichajes - Login</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div>
            <h1>Login</h1>
        </div>
    </div>
                <!-- The Modal -->
    <div id="myModal" class="modal">
    <!-- Modal content -->
        <div class="modal-content">
            <form action="logged.php" method="post">
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>