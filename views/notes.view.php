<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>

<main>
    <h1>My Notes</h1>
    <ul>
        <?php foreach ($notes as $note) : ?>
            <li class="list-item">
                <a href="./note?id=<?= $note['id'] ?>" class="list-item-link">
                    <?= (strlen($note['title']) > 50 
                        ? htmlspecialchars(substr($note['title'], 0, 50)) . '...' 
                        : htmlspecialchars($note['title'])) 
                    ?>
                </a>   
            </li>
        <?php endforeach; ?>
    </ul>


</main>

<?php require "partials/footer.php" ?>

