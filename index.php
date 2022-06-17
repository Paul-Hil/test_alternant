<?php include("head.html"); ?>
        <form action="/test_alternant/result.php" method="get">
            <div class="label">
                <label for="username">Quel est votre prénom :</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="label">
                <label for="min">Plus petit entier : </label>
                <input type="number" id="min" name="min">
            </div>

            <div class="label">
                <label for="max">Plus grand entier : </label>
                <input type="number" id="max" name="max">
            </div>

            <div class="submit">
                <input type="submit" id="submit" value="Soumettre">
            </div>
        </form>
    </body>
</html>