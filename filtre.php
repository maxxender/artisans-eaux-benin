<?php include_once 'ville-benin.php' ?>
<div class="filtre">
    <h4 class="form-part">Filtrez les services de plomberies par ville ou par prix</h4>
    <form action="">
        <div class="form-part">
            <h5>Selectionnez la ville ou vous etes</h5>
            <select name="" id="">
                <?php  foreach($villes as $ville): ?>
                    <option value=""><?= $ville ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-part">
            <h5>Entrez votre budget minimale et votre budget maximale</h5>
            <input type="text" placeholder="Montant minimale">
            <input type="text" placeholder="Montant maximale">
        </div>
        <button class="form-part">Cherchez selon mes critères</button>
    </form>
</div>