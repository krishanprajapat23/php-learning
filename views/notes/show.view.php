<?php require "views/partials/header.php" ?>
<?php require "views/partials/nav.php" ?>

<main>
        <div class="card m-4 card-body">
            <h1 class="card-title"><?= htmlspecialchars($note['title']) ?></h1>
            <small>Created on: <?= htmlspecialchars($note['created_on']) ?></small>
            <p><?= htmlspecialchars($note['body']) ?></p>
        </div>  
</main>

<?php require "views/partials/footer.php" ?>

