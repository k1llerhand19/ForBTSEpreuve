<center> 
    <link rel="stylesheet" href="style.css">
    <?php
        include 'ConnexionCommun.php';
        include 'verif.php';
        include "Classe-Commun.php";

        $commun = new Commun();
        $resultat = $commun->findAll();

        echo '<center>
                <table>
                    <tr class="align-middle text-center">
                        <th class="text-nowrap" id="slide">Id A</th>
                        <th class="text-nowrap" id="slide">B</th>
                        <th class="text-nowrap" id="slide">C</th>
                        <th class="text-nowrap" id="slide">D</th>
                    </tr>';

        foreach ($resultat as $commun) {
            echo '<tr class="align-middle text-center">
                    <td class="text-nowrap">' . $commun['ida'] . '</td>
                    <td class="text-nowrap" id="slide">' . $commun['b'] . '</td>
                    <td class="text-nowrap" id="slide">' . $commun['c'] . '</td>
                    <td class="text-nowrap" id="slide">' . $commun['d'] . '</td>
                </tr>';
        }

        echo '</table>';
    ?>
    
    <br>
    <hr>
    <br>
    <form action="verificationCrud.php" method="get">  
            <label for="ida">idA: </label>
        <input type="int" name="ida">
        <br><br>
            <label for="B">B: </label>
        <input type="text" name="B">
        <br><br>
            <label for="C">C: </label>
        <input type="text" name="C">
        <br><br>
            <label for="D">D: </label>
        <input type="text" name="D">
        <br>
        <br>
        <input type="submit"value="Créer" name="create" > <input type="submit"value="modifier" name='update' >  </br>
    <hr>
    <br>
        <label for="idar">idA: </label>
        <input type="int" name="idar">
        <br>
        <br>
        <input type="submit"value="chercher" name='retrieve' > <input type="submit"value="supprimer" name='delete' > </br>
    </form>
</center>
