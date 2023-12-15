<?php

function factorielle($n)
{
    // if( $n == 1 )
    if( $n <= 1 )
    {
        return 1;
    }
    return $n * factorielle($n-1);
}

/*
*/


/*
 *
 * 5! = 5 * 4 * 3 * 2
 * 4! =     4 * 3 * 2
 * 5! = 5 * 4!
 * 4! = 4 * 3!
 *
 */