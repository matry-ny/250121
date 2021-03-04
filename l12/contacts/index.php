<?php

$comments = require __DIR__ . '/get-comments.php';

?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>

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
        <form action="add-comment.php" method="post">
            <div class="mb-3 mt-3">
                <label for="author_name">Author Name</label>
                <input type="text" name="author" id="author_name" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="author_gender">Gender</label>
                <select name="gender" id="author_gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" required class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Send Comment</button>
        </form>

        <table>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td>
                    <p>
                        <?= $comment['author'], '<br>' ?>
                        <?= $comment['gender'], '<br>' ?>
                        <?= date('Y-m-d H:i:s', $comment['time']) ?>
                    </p>
                </td>
                <td valign="top">
                    <?= nl2br($comment['comment']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; SkillUp 25.01.21</span>
    </div>
</footer>

</body>
</html>