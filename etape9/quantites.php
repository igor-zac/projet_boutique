<?php

function affichageQuantite(int $quantite, $errTable, string $key)
{
    ?>

    <div class="quantities d-flex flex-column">
        <div class="quantity d-flex flex-row">
            <label>Quantité :
                <input type="number" name="<?= $key ?>" value="<?= $quantite ?>">

            </label>


        </div>
        <p class="error"><?php echo htmlspecialchars($errTable[$key]) ?></p>
        <button type="submit" name="delete" value="<?= $key ?>" class="btn btn-secondary">Supprimer</button>
    </div>
    <?php
}
?>

