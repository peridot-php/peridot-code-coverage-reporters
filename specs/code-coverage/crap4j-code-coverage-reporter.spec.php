<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\Crap4JCodeCoverageReporter;
use SebastianBergmann\CodeCoverage\Report\Crap4j;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('Crap4JCodeCoverageReporter', function () {

    beforeEach(function () {
        $this->reporter = new Crap4JCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create a crap4j style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof Crap4j);
    });

    it('should define the default path to the crap4j.xml output file', function () {
        assert($this->reporter->getReportPath() == 'code-coverage-report/crap4j.xml');
    });

});
