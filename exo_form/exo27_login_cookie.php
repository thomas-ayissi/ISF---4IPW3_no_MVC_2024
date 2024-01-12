<?php

/*
 *  Bibliothèque de fonctions (mini MVC)
 */

function html_head($title="4IPDW", $welcome="")
{
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
    </head>
    <body>
        <h1><?=$welcome?></h1>
        <pre>
            <?php
            echo 'GET:'; var_dump($_GET);
            echo 'POST:'; var_dump($_POST);
            // echo 'SESSION:'; var_dump($_SESSION);
            echo 'COOKIE:'; var_dump($_COOKIE);
            ?>
        </pre>
    <?php
    return ob_get_clean();
}


/**
 * affiche le formulaire de login
 * @param $intro string texte introductif
 * @param $value string valeur à afficher dans l'input
 */
function html_login_form($intro="", $value="")
{
    ob_start();
    ?>
    <div><?=$intro?></div>
    <form method="post">
        <div>
            Votre login :
            <input type="text" name="login" placeholder="blabla" value="<?=$value?>"/>
            <button type="submit" name="send">
                Envoyer
            </button>
        </div>
    </form>
    <?php
    return ob_get_clean();
}


function html_logout_form()
{
    ob_start();
    ?>
    <form method="post">
        <div>
            <button type="submit" name="logout">
                Log out
            </button>
        </div>
    </form>
    <?php
    return ob_get_clean();
}


function html_welcome_user($people)
{
    ob_start();
    echo "<div>Hello $people.  Do what you want.</div>";
    echo html_logout_form();
    return ob_get_clean();
}


function html_foot()
{
    ob_start();
    ?>
    </body>
    </html>
    <?php
    return ob_get_clean();
}

///////////////////////////////////////////////////////////////////////
// MAIN

// PROCESS COOKIES

$expiration_after = 60;
$html_output = '';

if( isset($_POST['logout']))
{
    // l'utilisateur veut se délogguer
    // $_COOKIE['is_logged'] = false;
    setcookie( 'is_logged', false, time()+$expiration_after );
    $html_output .= html_login_form("Vous êtes déloggué");
}
elseif( isset($_COOKIE['is_logged']) and $_COOKIE['is_logged'] == true )
{
    // l'utilisateur est déjà loggué
    $user = $_COOKIE['logged_user'] ?? 'user';
    // $message = $_SESSION['is_logged'] ? "vous êtes loggué" : "vous n'êtes pas loggué";
    $html_output .= html_welcome_user($user);
}
elseif( isset($_POST['send']))
{
    // scénario : l'utilisateur se loggue, le bouton a été cliqué
    // print_r($_GET);
    // echo "Qui se loggue ? C'est " . $_POST['login'];

    // liste  des personnes autorisées
    $authorized_people = "Reda";

    // validation de la personne se logguant
    if( $authorized_people == $_POST['login'] )
    {
        // la bonne personne est logguée
//        $_COOKIE['is_logged'] = true;
        setcookie( 'is_logged', true, time()+$expiration_after);
//        $_COOKIE['logged_user'] = $_POST['login'];
        setcookie( 'logged_user', $_POST['login'], time()+$expiration_after);

        $html_output .= html_welcome_user($authorized_people);
    }
    else
    {
        // une mauvaise personne est logguée
        $html_output .= html_login_form("Go to hell", $_POST['login'] );
    }

}
else
{
    // scénario : l'utilisateur arrive sur le site
    // on affiche le form
    $html_output .= html_login_form();
}

// BUILD MAIN PAGE

echo html_head("Home", "Welcome everybody to 4IPDW world !");

echo $html_output;

echo html_foot();

