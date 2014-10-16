<?php

use Evenement\EventEmitter;
use Peridot\CodeCoverage\Reporter\TextCodeCoverageReporter;
use Peridot\Configuration;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('TextCodeCoverageReporter', function () {

    beforeEach(function() {
        $this->reporter = new TextCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create an text style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof PHP_CodeCoverage_Report_Text);
    });

    it('should define the report path as false', function () {
        assert($this->reporter->getReportPath() == false);
    });

});
