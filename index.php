<?php
$result = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Calculatrice</title>
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
         <link rel="stylesheet" <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
        <h1>Calculatrice</h1>
        <form action="index.php" method="GET">
            <div class="row">
            <input class="offset-2 col-md-4 mt-2" type="text" name="chiffre1" value="0"/>
            <input class="col-md-4 mt-2" type="text" name="chiffre2" value="0"/>
            <input class="offset-2 col-md-2 mt-2 " id="blue" type="submit" name="addition" value="+"/>
            <input class="col-md-2 mt-2" id="green" type="submit" name="soustraction" value="-"/>
            <input class="col-md-2 mt-2" id="yellow" type="submit" name="multiplication" value="*"/>
            <input class="col-md-2 mt-2" id="red" type="submit" name="division" value="/"/>
            </div>
        </form>
        <p class="mt-2 alert alert-warning w-50 m-auto"> Résultat :
            <?php
            //Si le premier chiffre et le 2éme ne sont pas vide et numéric
            if (!empty($_GET['chiffre1']) && is_numeric($_GET['chiffre1']) && !empty($_GET['chiffre2']) && is_numeric($_GET['chiffre2'])) {
                // fais une boucle qui test tous les GET appliqué
                foreach ($_GET as $result) {
                    //si $result différent de chiffre 1 et 2 , $result = le signe
                    if ($result != 'chiffre1' || $result != 'chiffre2') {
                        $operator = $result;
                    }
                }
                //Condition , division par 0 impossible
                if ($operator == '/' && $_GET['chiffre2'] == 0) {
                    echo 'la division par 0 est impossible!';
                } else {
                    //affichage du resultat
                    $result = $_GET['chiffre1'] . $operator . $_GET['chiffre2'];
                    echo $result . ' = ';
                    eval('echo ' . $result . ';');
                }
                //si il ne rentre pas dans la premiére condition
            } else {
                echo 'Renseigner les 2 champs avec des chiffres.';
            }
            ?> 
        </p>    
        <form method="get">
            <!-- refresh la page car nous ne stockons pas les valeurs -->
            <p><input class="col-md-2 mt-2" id="black" type="submit" name="reset" value="reset"></p>
        </form>
        </div>
    </body>
</html>