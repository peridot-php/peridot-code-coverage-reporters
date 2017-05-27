<?php

namespace Peridot\Reporter\CodeCoverage;

use SebastianBergmann\CodeCoverage\Report\Clover;

/**
 * Class CloverCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class CloverCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    protected $reportPath = 'code-coverage-report/clover.xml';

    /**
     * Create the desired code coverage reporter.
     *
     * @return Clover
     */
    protected function createCoverageReporter()
    {
        return new Clover();
    }
}
