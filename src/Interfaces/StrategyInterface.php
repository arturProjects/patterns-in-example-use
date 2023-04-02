<?php

namespace Art\Exercise\Interfaces;

interface StrategyInterface
{
   public function readFile($openedFile, $fileSize);
}