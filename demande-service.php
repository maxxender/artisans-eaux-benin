<form action="./demande-service-post.php" method="post" id="form-demande-service" enctype="multipart/form-data">
    <div id="service-voulu">
        <h4>Vous n'avez choisi aucun service pour le moment</h4>
        <p></p>
    </div>
          <div class="form-div-group">
            <p>A partir d'ou avez vous besoin de ce service</p>
          <h6>Dans quel département ?</h6>
          <select id="departement" class="" name="departement">
                <?php foreach($departements as $departement): ?>
                  <option value="<?= $departement ?>"><?= $departement ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div>
            <h6>Dans quel ville ?</h6>
              <select id="ville" class="" name="ville">
                <?php foreach($villes as $ville): ?>
                  <option value="<?= $ville ?>"><?= $ville ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div>
            <h6>Le contact pour vous joindre</h6>
            <input type="text" name="contact" id="contact-client">
          </div>
          <div>
            <h6>Souhaitez vous etres contactez par appels ou messages whatsapp</h6>
            <div class="btn-type-contact" >Appel telephonique</div>
            <div class="btn-type-contact" >Message Whatsapp</div>
          </div>
          <button type="submit" class="btn-submit" id="submit-demande-service">Envoyer à tous les plombiers et hydraulicien du Bénin </button>
        </form>