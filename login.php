<!doctype html>
<html lang="nl">

<head>
    <title>Login</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <div class="container">
        <h1>Login</h1>
        <form action="backend/loginController.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="Login" class="btn btn-primary">
        </form>
    </div>

</body>

</html>