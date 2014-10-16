<?php

namespace Peridot\CodeCoverage\Reporter;

use PHP_CodeCoverage_Report_Clover;

/**
 * Class CloverCodeCoverageReporter
 * @package Peridot\CodeCoverage\Reporter
 */
class CloverCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    public function getReportPath()
    {
        return getcwd() . '/code-coverage-report/clover.xml';
    }

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
