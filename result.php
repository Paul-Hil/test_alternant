<?php include("head.html"); ?>

<a href="http://localhost/test_alternant/">
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
    }
    else {
        echo '<p>Error: Mauvaise entrées dans les champs</p>';
    }

} else {
    echo '<p>Error: Mauvaise entrées dans un des champs</p>';
}
?>

<a id="button_home" href="http://localhost/test_alternant/">
    <button>Revenir au menu</button>
</a>

</body>
</html>
