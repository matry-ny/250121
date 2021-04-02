<?php

require_once __DIR__ . '/../lib/sessions.php';

$registerData = sessionGet('register-form', []);

?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Files</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .container {
            width: auto;
            max-width: 680px;
            padding: 0 15px;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <?php foreach (getFlash('errors', []) as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
        <form method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <label for="inputEmail" class="visually-hidden">Email address</label>
            <input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign In</button>
        </form>

        <h5 class="mt-5">or register</h5>

        <form method="post" action="register.php">
            <label for="inputName" class="visually-hidden">Name</label>
            <input type="text"
                   name="name"
                   value="<?= $registerData['name'] ?? '' ?>"
                   id="inputName"
                   class="form-control"
                   placeholder="Name"
                   required>

            <label for="inputEmail" class="visually-hidden">Email address</label>
            <input type="email"
                   name="login"
                   value="<?= $registerData['login'] ?? '' ?>"
                   id="inputEmail"
                   class="form-control"
                   placeholder="Email address"
                   required>

            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password"
                   name="password"
                   value="<?= $registerData['password'] ?? '' ?>"
                   id="inputPassword"
                   class="form-control"
                   placeholder="Password"
                   required>

            <label for="inputRepeatPassword" class="visually-hidden">Repeat Password</label>
            <input type="password"
                   name="repeat_password"
                   value="<?= $registerData['repeat_password'] ?? '' ?>"
                   id="inputRepeatPassword"
                   class="form-control"
                   placeholder="Repeat Password"
                   required>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign Up</button>
        </form>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; SkillUp 25.01.21</span>
    </div>
</footer>

</body>
</html>