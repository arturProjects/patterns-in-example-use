<?php

namespace Art\Exercise;

use Art\Exercise\Interfaces\ReadFileInterface;
use Art\Exercise\Interfaces\StrategyInterface;

class ReadFile implements ReadFileInterface
{
    const FILE_SIZE = 32000000;
    private StrategyInterface $strategy;

    public function setStrategy(StrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function getFileName($file)
    {
        return $file;
    }

    public function getFileSize($file): bool|int
    {
        return filesize($file);
    }

    public function openFile($file)
    {
       return fopen($file,"r");
    }

    public function readFile($file)
    {
        $fileSize = $this->getFileSize($file);
        $openedFile = $this->openFile($file);
        if($fileSize >= self::FILE_SIZE)
        {
            $this->setStrategy(new BigFileStrategy());
        }
        if($fileSize < self::FILE_SIZE)
        {
            $this->setStrategy(new SmallFileStrategy());
        }
        print_r($this->strategy->readFile($openedFile, $fileSize));

    }

    public function getAllLines($openedFile): \Generator
    {
        while (!feof($openedFile)) {
            yield fgets($openedFile);
        }
    }

    public function printLines($lines)
    {
        if(is_iterable($lines))
        {
            $count = 0;
            foreach ($lines as $line)
            {
                $count += 1;
                print_r($count.". ".$line."\r\n"); //PHP_EOF
            }
        }
    }

    public function closeFile($openedFile): bool
    {
        return fclose($openedFile);
    }

    public function printText($text)
    {
        return $text;
    }
}


