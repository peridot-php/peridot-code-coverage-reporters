<?php

use Evenement\EventEmitterInterface;
use Peridot\CodeCoverage\Plugin;

/**
 * Configure peridot.
 */
return function(EventEmitterInterface $eventEmitter) {
    Plugin::load($eventEmitter);
};
