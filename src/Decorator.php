<?php

namespace Art\Exercise;

use Art\Exercise\Interfaces\ReadFileInterface;

class Decorator implements ReadFileInterface
{
    private ReadFileInterface $readFileObject;
    public function __construct(ReadFileInterface $readFileObject)
    {
        $this->readFileObject = $readFileObject;
    }

    public function getFileName($file)
    {
        return $this->readFileObject->getFileName($file);
    }
    public function getFileSize($file)
    {
        return $this->readFileObject->getFileSize($file);
    }
    public function openFile($file)
    {
        return $this->readFileObject->openFile($file);
    }
    public function  readFile($file)
    {
        return $this->readFileObject->readFile($file);
    }
    public function getAllLines($openedFile)
    {
        return $this->readFileObject->getAllLines($openedFile);
    }

    public function printLines($lines)
    {
        if(is_iterable($lines))
        {
            $count = 0;
            foreach ($lines as $line)
            {
                $count += 1;
                print_r($count.". ".$line. PHP_EOL);
            }
        }
    }
    public function closeFile($openedFile)
    {
        return $this->readFileObject->closeFile($openedFile);
    }
}