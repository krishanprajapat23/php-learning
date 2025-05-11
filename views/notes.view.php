<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>

<main>
    <div class="container">
        <h1>My Notes</h1>
        <div class="text-end">
            <a href="./create" class="link btn btn-warning">Create New Note</a>
        </div>
        <ul>
            <?php foreach ($notes as $note) : ?>
                
                <li class="list-item">
                    <a href="./note?id=<?= $note['id'] ?>" class="list-item-link">
                        <?= htmlspecialchars($note['title']) ?>
                    </a>   
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


</main>

<?php require "partials/footer.php" ?>

