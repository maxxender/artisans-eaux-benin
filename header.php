<nav class="navbar navbar-expand-lg navbar-dark" >
      <div class="container">
        <a class="navbar-brand" href="./"><img src="./images/artisans.png" class="logo" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="services.php">Prestations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produits-artisans.php">Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            <li class="nav-item dropdown" style="display: none;">
              <a class="nav-link dropdown-toggle" href="./services.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Nos services
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Adduction d'eau</a></li>
                <li><a class="dropdown-item" href="#">Assainissement</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Formation en plomberie</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="account.php">Mon compte</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="search.php" method="post">
            <input class="form-control me-2" type="search" placeholder="Cherchez un service" aria-label="Search" name="recherche">
            <button class="btn btn-outline-success" type="submit">cherchez un service</button>
          </form>
        </div>
      </div>
    </nav>