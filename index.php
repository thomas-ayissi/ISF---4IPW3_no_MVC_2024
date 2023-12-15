<?php
require_once "bib.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4ipdw</title>
</head>
<p>

<p><a href="exo_form.php">Exo Form</a></p>

<?php

// affichez les étudiants avec leur note

$nomEtudiant = ["Julie", "Sophie", "Maxime"];
$nomEtudiant[] = "Valentin";
$noteEtudiant = [ 18, 15, 12, 20 ];
$etudiant_s = implode( "|", $nomEtudiant);

$input = "a;b;c;d;e";
$input_a = explode( ";", $input);

$out =  <<< HTML
    <p>$etudiant_s</p>
    <p>$input_a[1]</p>
HTML;

$out .= "<ul>";
foreach( $nomEtudiant as $i => $etudiant )
{
    $out .= "<li>$etudiant (index $i) : $noteEtudiant[$i]</li>";
}
$out .= "</ul>";

// assoc array 1
$dataEtudiant = [
        "Julie" => 8,
        "Sophie" => 13,
        "Maxime" => 15
];

$out .= "<ul>";
foreach( $dataEtudiant as $stud => $note )
{
    $out .= "<li>$stud : $note</li>";
}
$out .= "</ul>";

// assoc array 2
$record_1 = [
    "nom"    => "Julie",
    "note"   => 13
];
$record_2 = [
    "nom"    => "Sophie",
    "note"   => 19
];
$record_3 = [
    "nom"    => "Maxime",
    "note"   => 8
];
$dataEtudiant2 = [
    $record_1,
    $record_2,
    $record_3
];
$out .= "<ol>";
foreach( $dataEtudiant2 as $etudiant )
{
    $nom = $etudiant['nom'];
    $note = $etudiant['note'];
    $out .= <<< HTML
        <li>$nom : $note</li>
HTML;
}
$out .= "</ol>";
$out .= "<p>{$dataEtudiant2[2]['note']}</p>";
echo $out;


// texte introductif
/* ceci est un exemple de PHP générant du HTML */
$balise = "h1";
$mon_texte = "Hello beautiful world !";
// $html = "<$balise>$mon_texte</$balise>";

echo <<< MA_BALISE
    <$balise>
        $mon_texte<br>
        Et voici du texte supplémentaire ...
    </$balise>
MA_BALISE;

// echo $html;

//$bad_html = '<$balise>$mon_texte</$balise>';
//echo $bad_html;

?>

<?php

$temperature = 200;
//$html = "<p>";

if( $temperature == 100 )
{
    $contenu = "il fait chaud";
}
else
{
    $contenu = "il fait froid";
}

$contenu2 = $temperature > 30 ? "canicule" : "pôle nord";



// $html .= "</p>";

echo "<p>$contenu</p>";
echo "<p>$contenu2</p>";

for( $i=0; $i<4 ; $i++ )
{
    echo "<hr>";
}

for( $i=0; $i<10; $i++ )
{
    echo "<p>" . factorielle($i) . "</p>";
}

?>
</body>
</html>