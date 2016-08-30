Cours de PHP
============

Ce dépôt contient le support d'un enseignement PHP utilisant Slidey pour mélanger contenu
du cours et des slides.

Ce cours peut être consulté ici :

http://gregwar.com/php/

Construction
------------

Ce cours est basé sur [Slidey](https://github.com/Gregwar/SlideySkeleton), vous pouvez le construire
en utilisant:

```
composer.phar install
```

Puis, modifiez éventuellement la cible (`$targetDirectory`) dans `build.php`, et lancez:

```
make
```

Pour avoir le mode interactif, créez un fichier `password.php`:

```php
<?php
// password.php
return 'motdepasse';
```

Avant de lancer `make`.

Licence
-------

Le cours est sous licence [CC by-nc](http://creativecommons.org/licenses/by-nc/3.0/)

