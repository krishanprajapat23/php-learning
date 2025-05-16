<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<main>
    <section class="py-5">
        <div class="container">
            <div class="card border p-4 shadow-sm">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-5">
                        <div class="text-center mb-4">
                            <h1>Login</h1>
                        </div>
                        <form action="./login" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="<?= $_POST['email'] ?? '' ?>">
                                <?php if(isset($errors['email'])) : ?> 
                                    <p class="erorr-text text-danger small"><?= $errors['email'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*******" value="<?= $_POST['password'] ?? '' ?>">
                                <?php if(isset($errors['password'])) : ?> 
                                    <p class="erorr-text text-danger small"><?= $errors['password'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require base_path("views/partials/footer.php") ?>