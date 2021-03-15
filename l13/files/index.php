<?php

require_once __DIR__ . '/lib/files_render.php';

$storage = __DIR__ . '/storage';

$userDir = $_GET['rout'] ?? '';
$dir = realpath("{$storage}/{$userDir}");

if (stripos($dir, $storage) !== 0) {
    $dir = $storage;
}

$userDir = str_replace($storage, '', $dir);

$routs = scandir($dir);

$file = $_GET['file'] ?? '';
$fileHtml = drawFile($dir, $file);

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
            <?php
            $globalRout = "{$storage}/{$userDir}/{$rout}";
            $localRout = $userDir;
            $localFile = '';
            if (is_file($globalRout)) {
                $localFile = $rout;
            } else {
                $localRout .= '/' . $rout;
            }
            ?>
            <li>
                <a href="index.php?rout=<?= $localRout ?>&file=<?= $localFile ?>">
                    <?= $rout ?>
                </a>
                <?php if (is_file($globalRout)): ?>
                <a href="download.php?rout=<?= "{$localRout}/{$localFile}" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                    </svg>
                </a>
                <?php endif ?>
                <?php if (!in_array($rout, ['.', '..'])): ?>
                <a href="delete.php?rout=<?= "{$localRout}/{$localFile}" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </a>
                <?php endif ?>
            </li>
        <?php endforeach; ?>
        </ul>

        <?= $fileHtml ?>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; SkillUp 25.01.21</span>
    </div>
</footer>

</body>
</html>