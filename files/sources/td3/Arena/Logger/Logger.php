<?php

namespace Arena\Logger;

interface Logger
{
    public function addEntry($message);

    public function getEntries();
}
