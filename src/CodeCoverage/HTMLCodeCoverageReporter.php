<?php

namespace Peridot\Reporter\CodeCoverage;

use PHP_CodeCoverage_Report_HTML;
use Peridot\Console\Version;

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
        $name = Version::NAME;
        $version = Version::NUMBER;

        return new PHP_CodeCoverage_Report_HTML(
            50,
            90,
            " and <a href=\"http://peridot-php.github.io/\">$name $version</a>"
        );
    }
}
