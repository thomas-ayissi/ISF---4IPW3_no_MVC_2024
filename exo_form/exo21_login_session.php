<?php
session_start();

/*
 *  Bibliothèque de fonctions (mini MVC)
 */

function html_head($title="4IPDW", $welcome="")
{
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
            echo 'SESSION:'; var_dump($_SESSION);
            ?>
        </pre>
    <?php
}


/**
 * affiche le formulaire de login
 * @param $intro string texte introductif
 * @param $value string valeur à afficher dans l'input
 */
function html_login_form($intro="", $value="")
{
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
}


function html_logout_form()
{
    ?>
    <form method="post">
        <div>
            <button type="submit" name="logout">
                Log out
            </button>
        </div>
    </form>
    <?php
}


function html_welcome_user($people)
{
    echo "<div>Hello $people.  Do what you want.</div>";
    html_logout_form();
}


function html_foot()
{
    ?>
    </body>
    </html>
    <?php
}

///////////////////////////////////////////////////////////////////////
// MAIN
html_head("Home", "Welcome everybody to 4IPDW world !");

if( isset($_POST['logout']))
{
    // l'utilisateur veut se délogguer
    $_SESSION['is_logged'] = false;
    html_login_form("Vous êtes déloggué");
}
elseif( $_SESSION['is_logged'] == true )
{
    // l'utilisateur est déjà loggué
    html_welcome_user('user');
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
        $_SESSION['is_logged'] = true;
        html_welcome_user($authorized_people);
    }
    else
    {
        // une mauvaise personne est logguée
        html_login_form("Go to hell", $_POST['login'] );
    }

}
else
{
    // scénario : l'utilisateur arrive sur le site
    // on affiche le form
    html_login_form();
}

html_foot();

