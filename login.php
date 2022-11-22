<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Authentifier</title>
    <link rel="stylesheet" href="./src/styles/index.css" />
    <link rel="stylesheet" href="./src/styles/edit.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="icon" type="images/x-icon" href="./assets/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>

    <main>
        <section class="jumbotron login">
            <form action="./utils/authentification.php" method="POST">
                <img src="./assets/logo.png" alt="youcode logo" class="logo-login" />
                <div class="label">
                    <label for="email">Email:</label>
                    <input name="email" id="email" type="text" required />
                </div>
                <div class="label">
                    <label for="mdp">Mot de passe:</label>
                    <input id="mdp" name="mdp" type="password" required />
                </div>
                <button class="btn btn-sm btn-success">Authentifier</button>
            </form>
        </section>
    </main>

</body>

</html>