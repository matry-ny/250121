<?php

$menu = [
    [
        'title' => 'Home',
        'link' => '/',
    ],
    [
        'title' => 'About',
        'link' => '/about-us'
    ],
    [
        'title' => 'Products',
        'link' => '/catalog',
        'children' => [
            [
                'title' => 'Phones',
                'link' => '/catalog/phones'
            ],
            [
                'title' => 'TV',
                'link' => '/catalog/tv'
            ],
            [
                'title' => 'MP3',
                'link' => '/catalog/mp3'
            ],
        ],
    ],
    [
        'title' => 'Contacts',
        'link' => '/contacts',
    ],
];

$html = '<ul>';
for($i = 0; $i < count($menu); $i++) {
    if (array_key_exists('children', $menu[$i])) {
        $html .= "<li>";
        $html .= "<a href='{$menu[$i]['link']}'>{$menu[$i]['title']}</a>";
        $html .= "<ul>";
        for($k = 0; $k < count($menu[$i]['children']); $k++) {
            $html .= "<li><a href='{$menu[$i]['children'][$k]['link']}'>{$menu[$i]['children'][$k]['title']}</a></li>";
        }
        $html .= "</ul>";
        $html .= "</li>";
    } else {
        $html .= "<li><a href='{$menu[$i]['link']}'>{$menu[$i]['title']}</a></li>";
    }
}
$html .= '</ul>';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?= $html ?>
    <ul>
        <?php for($i = 0; $i < count($menu); $i++) : ?>
            <?php if (array_key_exists('children', $menu[$i])) : ?>
                <li>
                    <a href="<?= $menu[$i]['link'] ?>"><?= $menu[$i]['title'] ?></a>
                    <ul>
                    <?php for($k = 0; $k < count($menu[$i]['children']); $k++) : ?>
                        <li>
                            <a href="<?= $menu[$i]['children'][$k]['link'] ?>">
                                <?= $menu[$i]['children'][$k]['title'] ?>
                            </a>
                        </li>
                    <?php endfor ?>
                    </ul>
                </li>
            <?php else : ?>
                <li><a href="<?= $menu[$i]['link'] ?>"><?= $menu[$i]['title'] ?></a></li>
            <?php endif ?>
        <?php endfor ?>
    </ul>
</body>
</html>
