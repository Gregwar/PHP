<?php

/**
 * Calcule la somme des n premiers entiers
 */
function somme_entiers($n)
{
}

if (somme_entiers(5) == 5+4+3+2+1) {
    echo "OK: somme_entiers\n";
}

/**
 * Cherche la plus petite des valeurs d'un tableau
 */
function valeur_min($tab)
{
}

if (valeur_min(array(5,23,8,19,28,3,55,-52,100,82,75,22)) == -52) {
    echo "OK: valeur_min\n";
}

/**
 * Cherche l'indice de la plus petite des valeurs d'un tableau
 */
function valeur_min_indice($tab)
{
}

                // indices: 0 1  2 3  4  5 6  7   8   9  10 11
if (valeur_min_indice(array(5,23,8,19,28,3,55,-52,100,82,75,22)) == 7) {
    echo "OK: valeur_min_indice\n";
}

/**
 * Retourne la somme des éléments du tableau
 */
function somme_tableau($tab)
{
}

if (somme_tableau(array(12,23,4)) == 39) {
    echo "OK: somme_tableau\n";
}

/**
 * Trie le tableau $tab à l'aide de valeur_min_indice() (sans utiliser sort())
 */
function tri($tab)
{
}

if (tri(array(8,5,2,9,3,55,2)) == array(2,2,3,5,8,9,55)) {
    echo "OK: tri\n";
}
