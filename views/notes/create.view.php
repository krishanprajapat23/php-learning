<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<main>
    <div class="container p-4">
        <h1 class="mb-4">Create Note</h1>
        <form method="POST">
            <div class="input-box mb-3">
                <label for="title">Note Title</label>
                <input class="form-control" type="text" name="title" id="title" value="<?= $_POST['title'] ?? '' ?>"/>
                <?php if(isset($errors['title'])) : ?> 
                    <p class="erorr-text text-danger small"><?= $errors['title'] ?></p>
                <?php endif; ?>
            </div>
            <div class="input-box mb-3">
                <label for="body">Note Description</label>
                <textarea class="form-control" name="body" id="body" rows="4"><?= $_POST['body'] ?? '' ?></textarea>
                <?php if(isset($errors['body'])) : ?> 
                    <p class="erorr-text text-danger small"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>
            <div class="input-box">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>

    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>

