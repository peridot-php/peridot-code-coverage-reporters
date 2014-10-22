<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\CodeCoverage\Plugin;

/**
 * Configure peridot.
 */
return function(EventEmitterInterface $eventEmitter) {
    Plugin::load($eventEmitter);
};
