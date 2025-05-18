<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">
      <?= $SiteName ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if ($_SESSION['user'] ?? false) : ?>
            <a class="<?= isCurrURL('/php-learning/') || isCurrURL('/php-learning/dashboard') ? 'nav-link active' : 'nav-link'; ?>" aria-current="<?= isCurrURL('/php-learning/') || isCurrURL('/php-learning/dashboard') ? 'page' : ''; ?>" href="./dashboard">Dashboard</a>
            <?php else : ?>
              <a class="<?= isCurrURL('/php-learning/') || isCurrURL('/php-learning/index') ? 'nav-link active' : 'nav-link'; ?>" aria-current="<?= isCurrURL('/php-learning/') || isCurrURL('/php-learning/index') ? 'page' : ''; ?>" href="./">Home</a>
            <?php endif; ?>
        </li>
        <?php if($_SESSION['user'] ?? false) : ?>
        <li class="nav-item">
          <a class="<?= isCurrURL('/php-learning/notes') ? 'nav-link active' : 'nav-link'; ?>"
            aria-current="<?= isCurrURL('/php-learning/notes') ? 'page' : ''; ?>"
            href="./notes">Notes</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="<?= isCurrURL('/php-learning/about') ? 'nav-link active' : 'nav-link'; ?>"
            aria-current="<?= isCurrURL('/php-learning/about') ? 'page' : ''; ?>"
            href="./about">About</a>
        </li>
      </ul>
      <re class="d-flex" role="search">
        <?php if ($_SESSION['user'] ?? false) : ?>
          <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
          <div class="avatar">
              <img class="rounded-circle img-fluid" width="25" height="25" src="assets/img/user.jpg" alt="">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow m-2" aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center py-3">
                  <div class="avatar">
                    <img class="rounded-circle img-fluid" width="30" height="30" src="assets/img/user.jpg" alt="">
                  </div>
                  <h6 class="mt-2 text-body-emphasis"><?= $_SESSION['user']['email'] ?></h6>
                </div>
              </div>
              <div class="logout-wrapper">
                <form method="POST" action="./session">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-sm btn-secondary text-center w-100">Sign out</button>
                </form>
              </div>
            </div>
          </div>

        <?php else : ?>
          <div class="d-flex gap-1">
            <a href="./register" class="btn btn-warning">Register</a>
            <a href="./login" class="btn btn-outline-success">Login</a>
          </div>
        <?php endif; ?>
        </form>
    </div>
  </div>
</nav>