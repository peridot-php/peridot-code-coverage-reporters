<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\HTMLCodeCoverageReporter;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('HTMLCodeCoverageReporter', function () {

    beforeEach(function() {
        $this->reporter = new HTMLCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create an html style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof PHP_CodeCoverage_Report_HTML);
    });

    it('should define the path to the output directory', function () {
        assert($this->reporter->getReportPath() == getcwd() . '/code-coverage-report');
    });

});
