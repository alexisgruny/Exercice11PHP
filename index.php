<?php
$result = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Calculatrice</title>
    </head>
    <body>
        <h1>Une calculatrice en PHP</h1>
        <form action="index.php" method="GET">
            <input type="text" name="chiffre1" value="0"/>
            <input type="text" name="chiffre2" value="0"/>
            <input type="submit" name="addition" value="+"/>
            <input type="submit" name="soustraction" value="-"/>
            <input type="submit" name="multiplication" value="*"/>
            <input type="submit" name="division" value="/"/>
        </form>
        <p>Résultat : 
            <?php
            if (!empty($_GET['chiffre1']) && is_numeric($_GET['chiffre1']) && !empty($_GET['chiffre2']) && is_numeric($_GET['chiffre2'])) {
                foreach ($_GET as $result) {
                    if ($result != 'chiffre1' || $result != 'chiffre2') {
                        $operator = $result;
                    }
                }
                if ($operator == '/' && $_GET['chiffre2'] == 0) {
                    echo 'la division par 0 est impossible!';
                } else {
                    $result = $_GET['chiffre1'] . $operator . $_GET['chiffre2'];
                    echo $result . ' = ';
                    eval('echo ' . $result . ';');
                }
            } else {
                echo 'Renseigner les 2 champs avec des chiffres.';
            }
            ?> 
        </p>    
        <form method="get">
            <p><input type="submit" name="reset" value="reset"></p>
        </form>
    </body>
</html>