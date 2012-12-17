<?php

$user = new User;
$user->setName('Bob');

$em->persist($user);
$em->flush();
