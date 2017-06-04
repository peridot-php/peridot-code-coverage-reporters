<?php

namespace Peridot\Reporter\CodeCoverage;

use Peridot\Console\Version;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;

/**
 * Class HTMLCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class HTMLCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * Create the desired code coverage reporter.
     *
     * @return Facade
     */
    protected function createCoverageReporter()
    {
        $name = Version::NAME;
        $version = Version::NUMBER;

        return new Facade(
            50,
            90,
            " and <a href=\"http://peridot-php.github.io/\">$name $version</a>"
        );
    }
}
