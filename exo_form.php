<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4ipdw Exo Form</title>
</head>
<body>

<?php

var_dump($_GET);
var_dump($_POST);

$couleur = $_POST['couleur'] ?? "(vide)";

?>

<form method="post" action="form_server.php">

    <input type="text" name="couleur" value="<?=$couleur?>">

</form>

</body>
</html>