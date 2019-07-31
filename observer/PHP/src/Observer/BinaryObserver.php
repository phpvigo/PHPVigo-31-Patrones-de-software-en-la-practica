<?php

declare(strict_types=1);

namespace NumberConverter\Observer;

use NumberConverter\Subject\NumberSubject;

class BinaryObserver extends NumberObserver
{
    public function doUpdate(NumberSubject $numberSubject): void
    {
        echo 'To binary: '.decbin($numberSubject->getState()).PHP_EOL;
    }
}
