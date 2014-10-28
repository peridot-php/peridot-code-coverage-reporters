<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\HTMLCodeCoverageReporter;
use Peridot\Reporter\CodeCoverageConfiguration;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('CodeCoverageConfiguration', function () {

    beforeEach(function () {
        $this->eventEmitter = new EventEmitter();
        $this->configuration = new CodeCoverageConfiguration($this->eventEmitter);
    });

    it('should be able to get and set the report path', function () {
        $this->configuration->setReportPath('foo');
        assert($this->configuration->getReportPath() == 'foo');
    });

    it('should set the code coverage report path if the report path is set', function () {
        $htmlReporter = new HTMLCodeCoverageReporter(new Configuration(), new ConsoleOutput(), $this->eventEmitter);
        $this->configuration->setReportPath('foo');
        $this->eventEmitter->emit('code-coverage.start', [$htmlReporter]);
        assert($htmlReporter->getReportPath() == 'foo');
    });

});
