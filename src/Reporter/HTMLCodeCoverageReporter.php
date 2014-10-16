<?php

namespace Peridot\CodeCoverage\Reporter;

use PHP_CodeCoverage_Report_HTML;

/**
 * Class HTMLCodeCoverageReporter
 * @package Peridot\CodeCoverage
 */
class HTMLCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    public function getReportPath()
    {
        return getcwd() . '/code-coverage-report';
    }

    /**
     * Create the desired code coverage reporter.
     *
     * @return \PHP_CodeCoverage_Report_HTML
     */
    protected function createCoverageReporter()
    {
        return new PHP_CodeCoverage_Report_HTML();
    }
}
