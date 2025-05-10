<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>

<main>
        <div class="card m-4 card-body">
            <h1 class="card-title"><?= $note['title'] ?></h1>
            <small>Created on: <?= $note['created_on'] ?></small>
            <p><?= $note['body'] ?></p>
        </div>  
</main>

<?php require "partials/footer.php" ?>

