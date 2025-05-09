<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>

<main>
    <?php if ($note): ?>
        <div class="card m-4 card-body">
            <h1 class="card-title"><?= htmlspecialchars($note['title']) ?></h1>
            <small>Created on: <?= htmlspecialchars($note['created_on']) ?></small>
            <p><?= nl2br(htmlspecialchars($note['body'])) ?></p>
        </div>
    <?php else: ?>
        <div class="m-4 alert alert-warning">
            No notes available.
        </div>
    <?php endif; ?>



</main>

<?php require "partials/footer.php" ?>

