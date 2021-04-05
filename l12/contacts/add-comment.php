<?php

require_once __DIR__ . '/lib/security.php';

$comment = $_POST['comment'] ?? '';
if (!$comment) {
    setFlash('errors', ['Comment is required']);
    header('Location: index.php');
    exit;
}

$db = getDbConnection();

$sql = 'INSERT INTO `comments` (user_id, comment) VALUES (?, ?)';
$stmt = mysqli_prepare($db, $sql);

$userId = $_SESSION['user']['id'];
mysqli_stmt_bind_param($stmt, 'is', $userId, $comment);
$result = mysqli_stmt_execute($stmt);

if (!$result) {
    setFlash('errors', [mysqli_stmt_error($stmt)]);
}

header('Location: index.php');
exit;

/*

$file = __DIR__ . '/storage/' . date('Y-m-d') . '.json';

// Read data begin
$jsonData = file_get_contents($file);
$storage = json_decode($jsonData, true);
// Read data end

// Write data begin
$data = $_POST;
$data['time'] = time();

$storage[] = $data;

$jsonData = json_encode($storage);

file_put_contents($file, $jsonData);
// Write data end

header('Location: index.php');

*/
