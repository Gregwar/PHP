<?php

/**
 * Dessine un mandelbrot avec des caractères sur la sortie standard
 */
function mandelbrot($width = 150, $height = 50, $scale = 30.0)
{
    /**
     * Fonction "interne" pour tester la divergeance d'un point dans
     * les conditions de mandelbrot
     *
     * Utilise 100 itérations de la suite et vérifie si le point est
     * dépasse 1000
     */
    function diverge($a, $b)
    {
        $xa = $ya = 0;

        for ($i=0; $i<100; $i++)
        {
            $xb = ($xa*$xa) - ($ya*$ya) + $a;
            $yb = 2*$xa*$ya + $b;

            $xa = $xb;
            $ya = $yb;
        }

        return (abs($xa)>1000 || abs($xb)>1000);
    }

    /**
     * Effectue le tracé ligne après ligne
     */
    for ($y=0; $y<$height; $y++)
    {
        for ($x=0; $x<$width; $x++) 
        {
            if (!diverge(($x-$width/2.0)/$scale, ($y-$height/2.0)/$scale)) {
                echo "##";
            } else {
                echo "  ";
            }
        }

        echo "\n";
    }
}

mandelbrot();
