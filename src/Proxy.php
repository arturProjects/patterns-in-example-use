<?php

namespace Art\Exercise;

use Art\Exercise\Interfaces\ProxyInterface;
use Art\Exercise\Interfaces\ReadFileInterface;

class Proxy extends Decorator implements ProxyInterface
{
    const TOKEN = 'aaaaaabbbbbbbccccccc';
    public function __construct($access, ReadFileInterface $readFileObject)
    {
        if($this->checkAccess($access))
        {
            $this->logAccess();
        }
        else {
            print_r('NO ACCESS');
            return;
        }
        parent::__construct($readFileObject);
    }
    public function checkAccess($access): bool
    {
        if (self::TOKEN === $access)
        {
            return true;
        }
        return false;
    }

    public function logAccess(): void
    {
        //log to file
        print_r("Proxy: Logging the time of request.\n");
    }
}
