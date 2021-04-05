<?php

$db = getDbConnection();

$sql = 'SELECT COUNT(1) AS count FROM comments';
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_fetch_assoc($result)['count'];

$pages = ceil($count / RECORDS_ON_PAGE);

$currentPage = $_GET['page'] ?? 1;

$pagesHtml = '';
for ($page = 1; $page <= $pages; $page++) {
    $class = $page === (int)$currentPage ? 'active' : '';
    $pagesHtml .= <<<HTML
        <li class='page-item {$class}'>
            <a class='page-link' href='index.php?page={$page}'>{$page}</a>
        </li>
    HTML;
}

$prevClass = $currentPage <= 1 ? 'disabled' : '';
$prevPage = $currentPage - 1;

$nextClass = $currentPage >= $pages ? 'disabled' : '';
$nextPage = $currentPage + 1;

return <<<HTML
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {$prevClass}">
                <a class="page-link" href="index.php?page={$prevPage}">Previous</a>
            </li>
            {$pagesHtml}
            <li class="page-item {$nextClass}">
                <a class="page-link" href="index.php?page={$nextPage}">Next</a>
            </li>
        </ul>
    </nav>
HTML;
