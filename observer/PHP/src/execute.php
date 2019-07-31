<?php

declare(strict_types=1);

use NumberConverter\Subject\NumberSubject;
use NumberConverter\Observer\BinaryObserver;
use NumberConverter\Observer\OctalObserver;
use NumberConverter\Observer\HexObserver;

require __DIR__.'/../../vendor/autoload.php';

$numberSubject = new NumberSubject();
new BinaryObserver($numberSubject);
new OctalObserver($numberSubject);
new HexObserver($numberSubject);

$numberSubject->setState(138);
