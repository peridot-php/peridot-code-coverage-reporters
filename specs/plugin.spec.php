<?php

use Evenement\EventEmitter;
use Peridot\CodeCoverage\Plugin;
use Peridot\Configuration;
use Peridot\Reporter\ReporterFactory;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;


describe('Plugin', function () {

    describe('::load()', function() {

        beforeEach(function() {
            $this->eventEmitter = new EventEmitter();
            $this->input = new ArgvInput();
            $this->reporterFactory = new ReporterFactory(new Configuration(), new ConsoleOutput(), $this->eventEmitter);
            Plugin::load($this->eventEmitter);
        });

        it('should register code coverage reporters', function () {
            $this->eventEmitter->emit('peridot.reporters', [$this->input, $this->reporterFactory]);
            $reporters = $this->reporterFactory->getReporters();
            assert(array_key_exists('clover-code-coverage', $reporters));
            assert(array_key_exists('crap4j-code-coverage', $reporters));
            assert(array_key_exists('html-code-coverage', $reporters));
            assert(array_key_exists('php-code-coverage', $reporters));
            assert(array_key_exists('text-code-coverage', $reporters));
            assert(array_key_exists('xml-code-coverage', $reporters));
        });
    });

});
