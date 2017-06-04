<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\XMLCodeCoverageReporter;
use SebastianBergmann\CodeCoverage\Report\Xml\Facade;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('XMLCodeCoverageReporter', function () {

    beforeEach(function () {
        $this->reporter = new XMLCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create an xml style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof Facade);
    });

    it('should define the default path to the output directory', function () {
        assert($this->reporter->getReportPath() == 'coverage');
    });

});
