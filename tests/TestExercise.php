<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Art\Exercise\ReadFile;
use PHPUnit\Framework\TestCase;

final class TestExercise extends TestCase
{
    public function testConstruct() {
        $actualClass = new ReadFile();
        $this->assertEquals('Exercise', $actualClass->printText('Exercise'));
    }
}
