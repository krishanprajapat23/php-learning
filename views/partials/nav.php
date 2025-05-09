<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
          <a class="<?= isCurrURL('/php-learning/') || isCurrURL('/php-learning/index') ? 'nav-link active' : 'nav-link'; ?>" aria-current="<?= isCurrURL('/php-learning/') || isCurrURL('/php-learning/index') ? 'page' : ''; ?>" href="./">Home</a>
        </li>
        <li class="nav-item">
          <a class="<?= isCurrURL('/php-learning/notes') ? 'nav-link active' : 'nav-link'; ?>"
          aria-current="<?= isCurrURL('/php-learning/notes') ? 'page' : ''; ?>"
          href="./notes">Notes</a>
        </li>
        <li class="nav-item">
          <a class="<?= isCurrURL('/php-learning/about') ? 'nav-link active' : 'nav-link'; ?>"
          aria-current="<?= isCurrURL('/php-learning/about') ? 'page' : ''; ?>"
          href="./about">About</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>