<?php

declare(strict_types=1);

namespace NumberConverter\Observer;

use NumberConverter\Subject\NumberSubject;

class HexObserver extends NumberObserver
{
    public function doUpdate(NumberSubject $numberSubject): void
    {
        echo 'To hexadecimal: '.dechex($numberSubject->getState()).PHP_EOL;
    }
}
