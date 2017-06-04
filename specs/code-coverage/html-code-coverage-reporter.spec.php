<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\HTMLCodeCoverageReporter;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('HTMLCodeCoverageReporter', function () {

    beforeEach(function () {
        $this->reporter = new HTMLCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create an html style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof Facade);
    });

    it('should define the default path to the output directory', function () {
        assert($this->reporter->getReportPath() == 'coverage');
    });

});
