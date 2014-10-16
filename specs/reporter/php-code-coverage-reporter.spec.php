<?php

use Evenement\EventEmitter;
use Peridot\CodeCoverage\Reporter\PHPCodeCoverageReporter;
use Peridot\Configuration;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('PHPCodeCoverageReporter', function () {

    beforeEach(function() {
        $this->reporter = new PHPCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create a php style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof PHP_CodeCoverage_Report_PHP);
    });

    it('should define the path to the coverage.php output file', function () {
        assert($this->reporter->getReportPath() == getcwd() . '/code-coverage-report/code-coverage.php');
    });

});
