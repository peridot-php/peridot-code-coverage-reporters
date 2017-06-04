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
    public function getReportPath()
    {
        return $this->reportPath . '/coverage.php';
    }

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
