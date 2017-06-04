<?php

namespace Peridot\Reporter\CodeCoverage;

use SebastianBergmann\CodeCoverage\Report\Crap4j;

/**
 * Class Crap4JCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class Crap4JCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    public function getReportPath()
    {
        return $this->reportPath . '/crap4j.xml';
    }

    /**
     * Create the desired code coverage reporter.
     *
     * @return Crap4j
     */
    protected function createCoverageReporter()
    {
        return new Crap4j();
    }
}
