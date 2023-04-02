<?php

namespace Art\Exercise\Interfaces;

interface ReadFileInterface
{
    public function getFileName($file);
    public function getFileSize($file);
    public function openFile($file);
    public function  readFile($file);
    public function getAllLines($openedFile);

    public function printLines($lines);
    public function closeFile($openedFile);

}