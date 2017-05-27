<?php

namespace Peridot\Reporter\CodeCoverage;

use SebastianBergmann\CodeCoverage\Report\Text;

/**
 * Class TextCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class TextCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * @var boolean
     */
    protected $reportPath = false;

    /**
     * Create the desired code coverage reporter.
     *
     * @return Text
     */
    protected function createCoverageReporter()
    {
        return new Text(50, 90, true, false);
    }
}
