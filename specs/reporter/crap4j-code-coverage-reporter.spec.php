<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\Crap4JCodeCoverageReporter;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('Crap4JCodeCoverageReporter', function () {

    beforeEach(function() {
        $this->reporter = new Crap4JCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create a crap4j style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof PHP_CodeCoverage_Report_Crap4j);
    });

    it('should define the path to the crap4j.xml output file', function () {
        assert($this->reporter->getReportPath() == getcwd() . '/code-coverage-report/crap4j.xml');
    });

});
