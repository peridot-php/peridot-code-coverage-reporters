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
    public function getReportPath()
    {
        return $this->reportPath . '/clover.xml';
    }

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
