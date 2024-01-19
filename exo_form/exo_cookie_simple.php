<?php

setcookie( 'test', '400', time()+120 );
// setcookie() envoie les infos au navigateur en
// même temps que la page web

var_dump($_COOKIE);
// $_COOKIE est les cookies en provenance du web client.
// initialisé au début du script

