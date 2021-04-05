<?php

$db = getDbConnection();

$currentPage = $_GET['page'] ?? 1;
$limit = RECORDS_ON_PAGE;
$offset = ($currentPage - 1) * $limit;

$sql = <<<SQL
    SELECT
        comments.id,
        comments.user_id,
        comments.comment,
        comments.created_at,
        comments.updated_at,
        users.name,
        users.age
    FROM comments 
        INNER JOIN users ON comments.user_id = users.id
    ORDER BY comments.created_at DESC
    LIMIT ? OFFSET ?
SQL;

$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $limit, $offset);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

return mysqli_fetch_all($result, MYSQLI_ASSOC);

//$dir = __DIR__ . '/storage';
//
//$files = scandir($dir);
//$files = array_filter($files, function (string $file): bool {
//    return !in_array($file, ['.', '..', '.gitignore']);
//});
//
//$storage = [];
//foreach ($files as $file) {
//    $jsonData = file_get_contents("{$dir}/{$file}");
//    $data = json_decode($jsonData, true);
//
//    $storage = array_merge($storage, $data);
//}
//
//return $storage;
