<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Console\Environment;
use Peridot\Console\InputDefinition;
use Peridot\Reporter\CodeCoverageConfiguration;
use Peridot\Reporter\CodeCoverageReporters;
use Peridot\Reporter\ReporterFactory;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('CodeCoverageReporters', function () {

    describe('->register()', function () {

        beforeEach(function () {
            $this->eventEmitter = new EventEmitter();
            $this->inputDefinition = new InputDefinition();
            $this->environment = new Environment($this->inputDefinition, $this->eventEmitter, []);
            $this->reporterFactory = new ReporterFactory(new Configuration(), new ConsoleOutput(), $this->eventEmitter);
            $this->configuration = new CodeCoverageConfiguration($this->eventEmitter);
            $this->reporters = (new CodeCoverageReporters($this->eventEmitter, $this->configuration))->register();
        });

        it('should create a code-coverage-path console option', function () {
            $this->eventEmitter->emit('peridot.start', [$this->environment]);
            assert($this->environment->getDefinition()->hasOption('code-coverage-path'));
        });

        it('should register code coverage reporters', function () {
            $this->eventEmitter->emit('peridot.reporters', [new ArgvInput(), $this->reporterFactory]);
            $reporters = $this->reporterFactory->getReporters();
            assert(array_key_exists('clover-code-coverage', $reporters));
            assert(array_key_exists('crap4j-code-coverage', $reporters));
            assert(array_key_exists('html-code-coverage', $reporters));
            assert(array_key_exists('php-code-coverage', $reporters));
            assert(array_key_exists('text-code-coverage', $reporters));
            assert(array_key_exists('xml-code-coverage', $reporters));
        });

        it('should set the code coverage path if the code-coverage-path option is set', function () {
            $this->eventEmitter->emit('peridot.start', [$this->environment]);
            $input = new ArgvInput([__FILE__, '--code-coverage-path', 'foo', 'specs/'], $this->inputDefinition);
            $this->eventEmitter->emit('peridot.execute', [$input, new ConsoleOutput()]);
            assert($this->configuration->getReportPath() == 'foo');
        });

    });

});
