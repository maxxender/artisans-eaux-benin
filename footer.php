<footer>
      <div class="footer-part">
        <h3>Qui sommes nous ?</h3>
        <p>
        Le groupement d'artisans plombiers du Benin réalise tous vos travaux de réparation, d'adduction d'eau et 
        débouchage de canalisation de wc, toilette, bidet, évier, baignoire, douche. Nos plombiers professionnels
         s'occupent de détecter et réparer vos fuites. Nous prenons également en charge les vidanges de fosse septique,
          le curage et le dégorgement.
         Nos artisans interviennet rapidementpartout au Benin  .
        </p>
      </div>
      <div class="footer-part">
        <h3>Que voulez vous faire ?</h3>
        <ul>
          <li><a href="#services">Comandez un service</a></li>
          <li><a href="inscription.php">S'inscrire sur le site</a></li>
          <li><a href="#formations">Suivre une formation</a></li>
        </ul>
      </div>
      <div class="footer-part">
        <h3>Devenir partenaire</h3>
        <p>
            Le programme de partenariat vous permet de metre en avant vos produits auprès des artisans en eaux de tout le Benin.
            Après vous etes inscrits, un compte vous sera créez ou vous pourrez mettre en ligne vos articles sur la plateforme.
        </p>
      </div>
      <div class="footer-part">
        <h3>Pourquoi commandez vos prestations en plomberie sur notre plateforme</h3>
        <p>
          Parce que les meilleures techniciens et artisans des métiers de l'eau du Benin sont sur notre plateforme.
        </p>
        <p>
          Parce que la plateforme est réalisez par les artisans pour les artisans et pour fournir les meilleures
          services en plomberie, assaisnissement et adduction d'eau sur tout l'étendue du territoire béninois.
        </p>
        <?= empty($_SESSION['membre_id']) ? ' ' : '<div ><a href="deconnexion.php">Déconnexion</a></div>' ?>

      </div>
    </footer>