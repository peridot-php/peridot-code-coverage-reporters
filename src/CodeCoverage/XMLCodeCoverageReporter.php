<?php

namespace Peridot\Reporter\CodeCoverage;

use Peridot\Console\Version;
use SebastianBergmann\CodeCoverage\Report\Xml\Facade;

/**
 * Class XMLCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class XMLCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    protected $reportPath = 'code-coverage-report';

    /**
     * Create the desired code coverage reporter.
     *
     * @return Facade
     */
    protected function createCoverageReporter()
    {
        return new Facade(Version::NUMBER);
    }
}
