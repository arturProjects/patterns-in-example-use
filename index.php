<?php

require_once __DIR__ . '/vendor/autoload.php';

use Art\Exercise\ReadFile;
use Art\Exercise\Decorator;
use Art\Exercise\Proxy;


   $fileOne = 'exampletext.txt';
   $token = 'aaaaaabbbbbbbccccccc';

   // with proxy
   $proxy = new Proxy($token, new Decorator(new ReadFile()));
   $openedFileOne = $proxy->openFile($fileOne);
   // with strategy
   $proxy->readFile($fileOne);
   //todo with strategy
   $lines = $proxy->getAllLines($openedFileOne);
   $proxy->printLines($lines);
   $proxy->closeFile($openedFileOne);




