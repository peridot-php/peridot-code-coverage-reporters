<?php

namespace Peridot\CodeCoverage\Reporter;

use PHP_CodeCoverage_Report_Crap4j;

/**
 * Class Crap4JCodeCoverageReporter
 * @package Peridot\CodeCoverage\Reporter
 */
class Crap4JCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    public function getReportPath()
    {
        return getcwd() . '/code-coverage-report/crap4j.xml';
    }

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
