<?php

namespace Art\Exercise\Interfaces;

interface ProxyInterface
{
    public function checkAccess($access);
    public function logAccess();
}