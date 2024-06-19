<?php

// Dit bestand mag NIET worden aangepast.
// Ook niet om je testscenarios te laten slagen.

readonly class Config
{
    public string $itemDelimiter;
    public string $contactDelimiter;

    public function __construct() {
        $this->itemDelimiter = "$";
        $this->contactDelimiter = "|";
    }
}