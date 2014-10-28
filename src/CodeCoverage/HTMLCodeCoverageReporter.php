<?php

namespace Peridot\Reporter\CodeCoverage;

use PHP_CodeCoverage_Report_HTML;

/**
 * Class HTMLCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class HTMLCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    protected $reportPath = 'code-coverage-report';

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
