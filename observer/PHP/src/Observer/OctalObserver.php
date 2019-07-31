<?php

declare(strict_types=1);

namespace NumberConverter\Observer;

use NumberConverter\Subject\NumberSubject;

class OctalObserver extends NumberObserver
{
    public function doUpdate(NumberSubject $numberSubject): void
    {
        echo 'To octal: '.decoct($numberSubject->getState()).PHP_EOL;
    }
}
