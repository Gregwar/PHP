<?php

if (isset($_COOKIE['seen']))
{
    echo "J'ai l'impression de vous connaitre";
}
else
{
    echo "Tiens, un nouveau visage !";

    // Definit le cookie seen à 1, qui expire 
    // dans une heure (=3600 secondes)
    setcookie('seen', 1, time()+3600);
}
