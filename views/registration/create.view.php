<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<main>
    <section class="py-5">
        <div class="container">
            <div class="card border p-4 shadow-sm">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="text-center mb-4">
                            <h1>Create your account</h1>
                        </div>
                        <form action="./register" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name" value="<?= $_POST['name'] ?? '' ?>">
                                <?php if(isset($errors['name'])) : ?> 
                                    <p class="erorr-text text-danger small"><?= $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="<?= $_POST['email'] ?? '' ?>">
                                <?php if(isset($errors['email'])) : ?> 
                                    <p class="erorr-text text-danger small"><?= $errors['email'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="*******" value="<?= $_POST['password'] ?? '' ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="******" value="<?= $_POST['confirm_password'] ?? '' ?>">
                                </div>
                                <div class="col-md-12 mt-0">
                                    <?php if(isset($errors['password'])) : ?> 
                                        <p class="erorr-text text-danger small"><?= $errors['password'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms">
                                <label class="form-check-label" for="terms">
                                    I have read and accept the <a href="#">Terms and Conditions</a>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require base_path("views/partials/footer.php") ?>