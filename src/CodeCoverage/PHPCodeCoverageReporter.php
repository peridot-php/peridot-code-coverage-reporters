<?php

namespace Peridot\Reporter\CodeCoverage;

use SebastianBergmann\CodeCoverage\Report\PHP;

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
     * @return PHP
     */
    protected function createCoverageReporter()
    {
        return new PHP();
    }
}
