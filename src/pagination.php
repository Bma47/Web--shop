<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if($current_page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page - 1 ?>" aria-label="Go to previous page">Previous</a>
            </li>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                <?php if($i == $current_page): ?>
                    <span class="page-link"><?= $i ?></span>
                <?php else: ?>
                    <a class="page-link" href="?page=<?= $i ?>" aria-label="Go to page <?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>

        <?php if($current_page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Go to next page">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>