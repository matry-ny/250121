<?php

$storage = __DIR__ . '/storage';

$userDir = $_GET['rout'] ?? '';
$dir = realpath("{$storage}/{$userDir}");

if (stripos($dir, $storage) !== 0) {
    $dir = $storage;
}

$userDir = str_replace($storage, '', $dir);

$routs = scandir($dir);

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
        <?php echo $dir ?>
        <form action="create-dir.php" method="post" class="mb-2">
            <input type="hidden" name="dir" value="<?= $userDir ?>">
            <div class="row">
                <div class="col-8">
                    <input type="text" name="directoryName" class="form-control" placeholder="Directory Name">
                </div>
                <button type="submit" class="btn btn-info col-4">Create Directory</button>
            </div>
        </form>
        <form action="upload-file.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="dir" value="<?= $userDir ?>">
            <div class="row">
                <div class="col-8">
                    <input type="file" name="file[]" multiple>
                </div>
                <button type="submit" class="btn btn-success col-4">Upload File</button>
            </div>
        </form>
        <ul>
        <?php foreach ($routs as $rout) : ?>
            <li>
                <a href="index.php?rout=<?= $userDir ?>/<?= $rout ?>">
                    <?= $rout ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; SkillUp 25.01.21</span>
    </div>
</footer>

</body>
</html>