<?php

namespace Peridot\CodeCoverage\Reporter;

use PHP_CodeCoverage;
use PHP_CodeCoverage_Report_PHP;

/**
 * Class PHPCodeCoverageReporter
 * @package Peridot\CodeCoverage\Reporter
 */
class PHPCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    public function getReportPath()
    {
        return getcwd() . '/code-coverage-report/code-coverage.php';
    }

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
