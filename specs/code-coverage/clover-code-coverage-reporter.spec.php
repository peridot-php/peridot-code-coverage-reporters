<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\CloverCodeCoverageReporter;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('CloverCodeCoverageReporter', function () {

    beforeEach(function () {
        $this->reporter = new CloverCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create a clover style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof PHP_CodeCoverage_Report_Clover);
    });

    it('should define the default path to the clover.xml output file', function () {
        assert($this->reporter->getReportPath() == 'code-coverage-report/clover.xml');
    });

});
