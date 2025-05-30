<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<main>
        <div class="card m-4 card-body">
            <h1 class="card-title"><?= htmlspecialchars($note['title']) ?></h1>
            <small>Created on: <?= htmlspecialchars($note['created_on']) ?></small>
            <p><?= htmlspecialchars($note['body']) ?></p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="./note/edit?id=<?= $note['id'] ?>" class="btn btn-secondary">Update</a>
                
                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>  
</main>

<?php require base_path("views/partials/footer.php") ?>

