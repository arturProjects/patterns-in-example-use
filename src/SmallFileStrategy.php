<?php

namespace Art\Exercise;

use Art\Exercise\Interfaces\StrategyInterface;

class SmallFileStrategy implements StrategyInterface
{
     public function readFile($openedFile, $fileSize): bool|string
     {
         return fread($openedFile, $fileSize);
     }
}