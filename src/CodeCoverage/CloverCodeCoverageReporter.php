<?php

namespace Peridot\Reporter\CodeCoverage;

use PHP_CodeCoverage_Report_Clover;

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
     * @return \PHP_CodeCoverage_Report_Clover
     */
    protected function createCoverageReporter()
    {
        return new PHP_CodeCoverage_Report_Clover();
    }
}
