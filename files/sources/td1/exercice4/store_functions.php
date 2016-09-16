<?php

/**
 * Charge les produits
 */
$products = @include('products.php');

if (!is_array($products)) {
    $products = [];
}

/**
 * Liste les produits
 */
function storeList()
{
    global $products;

    echo "Liste des produits :\n";

    foreach ($products as $name => $infos) {
        printf("* %s, quantité: %d, prix: %g\n", $name, $infos['quantity'], $infos['price']);
    }
}

/**
 * Ajout d'élément au magasin
 */
function storeAdd($name, $quantity)
{
    global $products;

    if (!isset($products[$name])) {
        $products[$name] = [
            'price' => null,
            'quantity' => 0,
        ];
    }

    $products[$name]['quantity'] += $quantity;

    storePersist();
}

/**
 * Persiste les éléments dans le fichier
 */
function storePersist()
{
    global $products;

    file_put_contents('products.php', '<?php return ' . var_export($products, true) . ';');
}
