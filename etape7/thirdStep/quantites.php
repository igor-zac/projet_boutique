<?php

function affichageQuantite(int $quantite, string $key)
{ ?>
    <div class="quantities d-flex flex-column">
        <div class="quantity d-flex flex-row">
            <label>Quantité :
                <input type="number" value="<?= $quantite ?>">
            </label>
        </div>
        <button type="submit" name="delete" value="<?= $key ?>" class="btn btn-secondary">Supprimer</button>
    </div>
    <?php
}
?>