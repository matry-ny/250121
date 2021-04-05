<?php

require_once __DIR__ . '/sessions.php';
require_once __DIR__ . '/db.php';

//var_dump(password_hash('123123',  PASSWORD_ARGON2ID));

$isGuest = $_SESSION['isGuest'] ?? true;

if ($isGuest) {
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($login && $password) {
        $user = findUser($login);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['isGuest'] = false;
            $_SESSION['user'] = $user;
        } else {
            setFlash('errors', ['Login or password is incorrect']);
            require __DIR__ . '/../views/auth_form.php';
            exit;
        }
    } else {
        require __DIR__ . '/../views/auth_form.php';
        exit;
    }
}

function findUser(string $login): ?array
{
    $db = getDbConnection();
    $sql = 'SELECT * FROM users WHERE login = ?';
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 's', $login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result);
}

//function findUser(string $login): ?array
//{
//    $users = [
//        [
//            'login' => 'test@test.com',
//            'name' => 'Test User',
//            'password' => '$argon2id$v=19$m=65536,t=4,p=1$RFBIUnR2QndVTktIWjBlOA$MWg7TaH8L5w+NXOR7YjPD1nXRNbqDTGX5hzQvgNQD20',
//        ],
//        [
//            'login' => 'qwerty@test.com',
//            'name' => 'Qwerty User',
//            'password' => '$argon2id$v=19$m=65536,t=4,p=1$N2Z1VVJtczR0YkRialF6ZQ$vahwp/BMa2z0G6NMknKfiCgZdvZXSx6lLeHoB9b7Kfc',
//        ],
//    ];
//
//    foreach ($users as $user) {
//        if (strtolower($user['login']) === strtolower($login)) {
//            return $user;
//        }
//    }
//
//    return null;
//}
