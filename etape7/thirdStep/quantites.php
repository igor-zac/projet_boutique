<?php

function affichageQuantite(int $quantite)
{ ?>
    <div class="quantities d-flex flex-column">
        <div class="quantity d-flex flex-row">
            <label>Quantité :
                <input type="number" value="<?= $quantite ?>">
            </label>
        </div>
        <button type="submit" class="btn btn-secondary">Supprimer</button>
    </div>
    <?php
}
?>