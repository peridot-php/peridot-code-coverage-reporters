<?php

namespace Peridot\CodeCoverage\Reporter;

use PHP_CodeCoverage_Report_Text;

/**
 * Class TextCodeCoverageReporter
 * @package Peridot\CodeCoverage\Reporter
 */
class TextCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * {@inheritdoc}
     */
    public function getReportPath()
    {
        return false;
    }

    /**
     * Create the desired code coverage reporter.
     *
     * @return \PHP_CodeCoverage_Report_XML
     */
    protected function createCoverageReporter()
    {
        return new PHP_CodeCoverage_Report_Text(50, 90, true, false);
    }
}
