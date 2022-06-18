<?php include("head.html"); ?>

<a href="/test_alternant">
    <img src="assets/60606.png">
</a>

<?php

$username = ucfirst($_GET['username']);

$min = filter_var($_GET['min'], FILTER_VALIDATE_INT);
$max = filter_var($_GET['max'], FILTER_VALIDATE_INT);

if($min && $max && strlen($username) >= 3) {
    if($min < $max) {
        echo '<p>Bonjour ' . $username . ', voici la table demandée :</p>';

        $resultsList = [];

        for ($i=$min; $i <= $max; $i++) {

            for ($j=$min; $j <= $max; $j++) {
                $row[$j] = $i * $j;
            }

        $resultsList[$i] = $row;

        } ?>

        <table class="array">
            <tr>
                <td>
                    &nbsp;
                </td>
        
        <!-- Première ligne du tableau -->
        <?php foreach ($resultsList as $key => $result) : ?>
                <td>
                    <?= $key ?>
                </td>

        <?php endforeach ?>
            </tr>

        <!-- // Pour chaque loop, une nouvelle ligne -->

        <?php foreach ($resultsList as $key => $result) : ?>

            <tr>
                <td>
                   <?= $key ?>
                </td>


            <!-- // Affiche tout les résultats de la ligne -->
            <?php foreach ($result as $key2 => $value) : ?>

                <td>
                    <?= $value ?>
                </td>

            <?php endforeach ?>
            </tr>
        <?php endforeach ?>

        </table>

        <!-- Si il y a plus de 15 multiplications croisées dans le tableau -->
        <?php if(($max - $min) > 13) : ?>
            <style>
                td {
                    padding: 5px 25px!important;
                }
            </style>
         <?php
        endif;
    }
    else {
        echo "<p>Erreur: Vérifier l'entrée pour les champs min et max du formulaire</p>";
    }

} else {
    echo '<p>Erreur: Mauvaise entrées dans un des champs du formulaire</p>';
}
?>

<a id="button_home" href="/test_alternant">
    Revenir au menu
</a>

</body>
</html>
