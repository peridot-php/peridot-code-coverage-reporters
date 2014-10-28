<?php

namespace Peridot\Reporter\CodeCoverage;

use PHP_CodeCoverage_Report_Crap4j;

/**
 * Class Crap4JCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class Crap4JCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    protected $reportPath = 'code-coverage-report/crap4j.xml';

    /**
     * Create the desired code coverage reporter.
     *
     * @return \PHP_CodeCoverage_Report_Crap4j
     */
    protected function createCoverageReporter()
    {
        return new PHP_CodeCoverage_Report_Crap4j();
    }
}
