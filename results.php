<?php include("head.html"); ?>

<a href="/test_alternant">
    <img src="assets/60606.png">
</a>

<?php

$username = $_GET['username'];

$min = filter_var($_GET['min'], FILTER_VALIDATE_INT);
$max = filter_var($_GET['max'], FILTER_VALIDATE_INT);

if($min && $max && strlen($username) > 3) {
    if($min < $max) {
        echo '<p>Bonjour ' . $username . ', voici la table demandée</p>';

        $results = [];

        for ($i=$min; $i <= $max; $i++) {

            for ($j=$min; $j <= $max; $j++) {
                $row[$j] = $i * $j;
            }

        $results[$i] = $row;

        }

        echo '<table class="array"><tr><td>&nbsp;</td>';

        foreach ($results as $key => $result) {
            echo '<td>'. $key .'</td>';
        }

        echo '</tr>';

        foreach ($results as $key => $result) {
            echo '<tr>';
            echo '<td>'. $key .'</td>';
            foreach ($result as $key2 => $value) {
                echo '<td>'. $value .'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        // Si il y a plus de 15 multiplications croisées
        if(($max - $min) > 15) {?>
        
            <style>
                td {
                    padding: 5px 20px!important;
                }
            </style>

            
        <?php
        }
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
