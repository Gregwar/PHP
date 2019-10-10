TrollQuiz
=========

.. slide::

Comment ça marche ?
~~~~~~~~~~~~~~~~~~~

Principes du TrollQuiz

.. discoverList::

    * On affiche du code (*un peu bizarre*)
    * Les exemples fonctionnent **tous** (avec parfois des *warnings*)
    * Vous avez toujours le droit de répondre "Je ne sais pas", ou au
      hasard...
    * Parfois, avec un peu de chance, on apprendra des choses...
    * Plus ou moins utiles :-)

.. slide::

.. code-block::

    <?php
    echo ([].[])['une orange' + '2 pommes' + true];

.. poll::

    * ``une orange2pommes1``
    * ``[][]3``
    * ``a``
    * ``[``
    * ``]``
    * Je ne sais pas

.. slide::

.. code-block::

    <?php
    echo 5*!!![]%(true+2*!'');

.. poll::

    * ``5``
    * ``51``
    * ``53``
    * ``3``
    * ``2``
    * Je ne sais pas

.. slide::

.. code-block::
    echo true-1?[1,2,3][false]:'_' . .5;

.. poll::

    * ``-1.5``
    * ``1``
    * ``0``
    * ``???``
    * ``_.5``
    * ``_0.5``
    * Je ne sais pas

.. slide::

.. code-block::
    echo 1337?!1?314:168:42;

.. poll::

    * ``1337``
    * ``1``
    * ``314``
    * ``168``
    * ``42``
    * Je ne sais pas

.. slide::

.. code-block::
    echo 1-0.-0.1-0.1.-1;

.. poll::

    * ``0.8-1``
    * ``1-1``
    * ``-0.2``
    * ``1-0.2``
    * ``1.8``
    * ``1-0.2-1``
    * Je ne sais pas

.. slide::

.. code-block::
    echo (-1 .-1 ).( -1.-1);

.. poll::

    * ``-2-2``
    * ``-1-1-2``
    * ``4``
    * ``-1-2``
    * ``x``
    * ``-4``
    * Je ne sais pas

.. slide::

.. code-block::
    echo (false/true)**false;

.. poll::

    * ``0``
    * ``+INF``
    * ``true``
    * ``1``
    * ``INF``
    * ``-0``
    * ``false``
    * Je ne sais pas

.. slide::

.. code-block::
    echo 1. . 0.+true.false+1 .null;

.. poll::

    * ``1``
    * ``10``
    * ``12``
    * ``21``
    * ``210``
    * ``120``
    * ``0``
    * Je ne sais pas

.. slide::

.. code-block::
    $x = 'y';
    $y = 'x';
    echo $x . $$x . $$$$y . $$$$$x;

.. poll::

    * ``xxyy``
    * ``x``
    * ``xxyx``
    * ``xyyx``
    * ``xyyy``
    * ``x``
    * Je ne sais pas

.. slide::

.. code-block::
    echo ((0==0)+!!!0)*((!0-~0). 0**0);

.. poll::

    * ``42``
    * ``0``
    * ``1``
    * ``00``
    * ``000``
    * ``+INF``
    * ``???``
    * Je ne sais pas

.. slide::

.. code-block::
    echo 10 + 010 + 0x11 + 0b111;

.. poll::

    * ``142``
    * ``10101``
    * ``42``
    * ``32``
    * ``1001011111``
    * ``45``
    * Je ne sais pas