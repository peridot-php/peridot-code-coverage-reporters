<?php

use Evenement\EventEmitter;
use Peridot\CodeCoverage\Reporter\XMLCodeCoverageReporter;
use Peridot\Configuration;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('XMLCodeCoverageReporter', function () {

    beforeEach(function() {
        $this->reporter = new XMLCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create an xml style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof PHP_CodeCoverage_Report_XML);
    });

    it('should define the path to the output directory', function () {
        assert($this->reporter->getReportPath() == getcwd() . '/code-coverage-report');
    });

});
