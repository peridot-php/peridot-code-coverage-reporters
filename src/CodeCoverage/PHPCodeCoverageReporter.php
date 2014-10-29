<?php

namespace Peridot\Reporter\CodeCoverage;

use PHP_CodeCoverage;
use PHP_CodeCoverage_Report_PHP;

/**
 * Class PHPCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class PHPCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    protected $reportPath = 'code-coverage-report/code-coverage.php';

    /**
     * Create the desired code coverage reporter.
     *
     * @return \PHP_CodeCoverage_Report_PHP
     */
    protected function createCoverageReporter()
    {
        return new PHP_CodeCoverage_Report_PHP();
    }
}
