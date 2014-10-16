<?php

namespace Peridot\CodeCoverage\Reporter;

use PHP_CodeCoverage_Report_XML;

/**
 * Class XMLCodeCoverageReporter
 * @package Peridot\CodeCoverage
 */
class XMLCodeCoverageReporter extends AbstractCodeCoverageReporter
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
     * @return \PHP_CodeCoverage_Report_XML
     */
    protected function createCoverageReporter()
    {
        return new PHP_CodeCoverage_Report_XML();
    }
}
