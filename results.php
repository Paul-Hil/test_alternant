<?php include("head.html"); ?>

<a href="/test_alternant">
    <img src="assets/60606.png" alt="Icone flèche gauche">
</a>

<?php
$username = ucfirst(filter_input(INPUT_GET, 'username', FILTER_UNSAFE_RAW));

$min = filter_input(INPUT_GET, 'min', FILTER_VALIDATE_INT);
$max = filter_input(INPUT_GET, 'max', FILTER_VALIDATE_INT);

// Si toutes les données sont bien récupérées
if($min && $max && strlen($username) >= 3) {
    if($min < $max) {

        echo '<p>Bonjour ' . $username . ', voici la table demandée :</p>';

        // Création du tableau contenant tout les résultats
        $resultsList = createArray($min, $max);

        // Affichage des résultats
        displayArray($resultsList); 

        $nbOfRow = ($max - $min);

        // Si il y a plus de 15 multiplications croisées dans le tableau 
        if($nbOfRow >= 20) {

            // Réduction du padding % $nbOfRow
            $nbOfPixels = 12 * (1 - ($nbOfRow / 100));

           echo '<style>
                td {
                    padding: 4px '.$nbOfPixels.'px;
                }
            </style>';
        }
    } else {
        echo "<p>Erreur: Champs min & max incorrects</p>";
    }
} else {
    echo '<p>Erreur: Mauvaise entrée dans un des champs du formulaire</p>';
}

function createArray($min, $max) {
    $resultsList = [];

    for ($i=$min; $i <= $max; $i++) {

        $row = [];

        for ($j=$min; $j <= $max; $j++) {
            $row[] = $i * $j;
        }

    // Tableau contenant les résultats
    $resultsList[$i] = $row;
    }

    return $resultsList;
}

function displayArray($resultsList) { ?>
    <table class="array">
        <tbody>

        <!-- Première ligne du tableau -->
        <tr>
            <td>
                &nbsp;
            </td>

    <?php foreach ($resultsList as $key => $result) : ?>
            <td>
                <?= $key ?>
            </td>

    <?php endforeach ?>
        </tr>

    <!-- // Pour chaque tour dans la boucle, une nouvelle ligne -->
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

        <?php endforeach;

    echo '</tr>';

    endforeach;

    echo '</tbody></table>';
}?>

    <a id="button_home" href="/test_alternant">Revenir au menu</a>

    </body>
</html>
