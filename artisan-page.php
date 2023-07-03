<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="artisan-page.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="Nouveau dossier/images/artisans.png" class="logo" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Nos plombiers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cherchez un plombier pour un service" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">faire une recherche</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="artisan-page">
        <div class="artisan-page-part">
            <h1>Badarou matinou</h1>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi expedita facilis iusto reiciendis voluptas,
                 dignissimos ullam cum. Sint ducimus earum ab eaque,
                 ullam repellat saepe nihil iusto vel ipsam architecto.
            </p>
            <div class="liens">
              <a href="" class="lien">MES REALISATIONS</a>
              <a href="" class="lien">MES SERVICES</a>
            </div>
        </div>
        <div class="artisan-page-part">
            <img src="images/matinouca.png" alt="">
        </div>
        <div class="artisan-page-part">
            <h6>Vous souhaitez entrez en contact avec BADAROU Matinou pour un projet, des travaux d'adduction d'eau ou d'assainissement ?</h6>
            <form action="" method="post">
                <input type="text" placeholder="Nom et prenom">
                <textarea name="" id="" placeholder="Votre message "></textarea>
                <button>Envoyez</button>
            </form>
        </div>
    </div>
    
    <div class="artisan-page-services-prev">
      <h3 class="artisan-page-services-prev-title">Les services que je propose sont ci-dessous</h3>
      <div class="artisan-page-services">
        <div class="artisan-page-service">
              <h3 class="artisan-page-service-title">Réalisation de forage manuel</h3>
              <img src="images/WhatsApp Image 2023-05-09 at 09.25.05 (1).jpeg" alt="">
              <a href="">en savois plus</a>
          </div>
          <div class="artisan-page-service">
              <h3 class="artisan-page-service-title">Réalisation de système d'irrigation</h3>
              <img src="images/WhatsApp Image 2023-05-09 at 09.25.05 (1).jpeg" alt="">
              <a href="">en savoir plus</a>
          </div>
          <div class="artisan-page-service">
              <h3 class="artisan-page-service-title">Pose et connexion des élements dans une salle de bain moderne</h3>
              <img src="images/WhatsApp Image 2023-05-09 at 09.25.05 (1).jpeg" alt="">
              <a href="">en savoir plus</a>
          </div>
        <div class="artisan-page-service">
              <h3 class="artisan-page-service-title">Réalisation de forage manuel</h3>
              <img src="images/WhatsApp Image 2023-05-09 at 09.25.05 (1).jpeg" alt="">
              <a href="">en savois plus</a>
          </div>
          <div class="artisan-page-service">
              <h3 class="artisan-page-service-title">Réalisation de système d'irrigation</h3>
              <img src="images/WhatsApp Image 2023-05-09 at 09.25.05 (1).jpeg" alt="">
              <a href="">en savoir plus</a>
          </div>
          <div class="artisan-page-service">
              <h3 class="artisan-page-service-title">Pose et connexion des élements dans une salle de bain moderne</h3>
              <img src="images/WhatsApp Image 2023-05-09 at 09.25.05 (1).jpeg" alt="">
              <a href="">en savoir plus</a>
          </div>
      </div>
    </div>
    <?php include_once 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>