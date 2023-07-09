<?php include_once 'ville-benin.php' ?>
<div class="filtre">
    <h4 class="">Filtrez les services de plomberies par ville ou par prix</h4>
    <form action="">
        <div class="form-parts">
        <div class="form-part">
            <legend>Ou etes vous ?</legend>
            <select name="" id="">
                <?php  foreach($villes as $ville): ?>
                    <option value=""><?= $ville ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-part">
            <legend>Budget minimale</legend>
            <input type="text" placeholder="Montant minimale">
        </div>
        <div class="form-part" >
            <legend>Budget maximale</legend>
            <input type="text" placeholder="Montant maximale">
        </div>
        </div>
       
        <button class="">Cherchez selon mes critères</button>
    </form>
</div>