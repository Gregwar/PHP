<?php

class MyException extends Exception
{
}

try
{
    throw new MyException();
} catch (MyException $my) {
    echo "MyException\n";
} catch (Exception $e) {
    echo "Exception\n";
}
