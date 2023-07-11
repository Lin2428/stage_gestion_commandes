<?php

/**
 * @var int $pageCount
 * @var int $currentPage
 */
$perPage = 10;

$hasMore = false;
if ($pageCount > 20) {
    $hasMore = true;
}

$counterStar = 1;
if($currentPage > 10) {
    $counterStar = $currentPage - $perPage;
}

$nextItems = $counterStar + ($perPage * 2);

$lastItem = $nextItems + 8;
if($lastItem > $pageCount) {
    $lastItem = $pageCount - $nextItems;
}

function renderItem($index, $currentPage, $baseUrl) {
    $isActive = $index == $currentPage ? 'active' : '';

    return '<li class="page-item '. $isActive .'"><a class="page-link" href="'. $baseUrl .'/?page='. $index .'">'. $index .'</a></li>';
}

?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if($currentPage > 1): ?>
        <li class="page-item">
            <a class="page-link" href="<?= $baseUrl .'/?page='. $currentPage - 1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($hasMore) : ?>
            <?php for ($i = $counterStar; $i <= ($counterStar + $perPage); $i++) : ?>
                <?= renderItem($i, $currentPage, $baseUrl) ?>
            <?php endfor; ?>

            <li class="page-item"><span class="page-link">...</span></li>
            <?php for ($i = $nextItems; $i <= $nextItems + 8; $i++) : ?>
                <?= renderItem($i, $currentPage, $baseUrl) ?>
            <?php endfor; ?>

        <?php else : ?>
            <?php for ($i = 1; $i <= $pageCount; $i++) : ?>
                <?= renderItem($i, $currentPage, $baseUrl) ?>
            <?php endfor; ?>
        <?php endif; ?>

            
        <?php if($currentPage < $pageCount): ?>
        <li class="page-item">
            <a class="page-link" href="<?= $baseUrl .'/?page='. $currentPage + 1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</nav>