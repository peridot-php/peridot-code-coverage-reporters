<?php

namespace Peridot\CodeCoverage\Reporter;

use Peridot\Reporter\AbstractBaseReporter;
use PHP_CodeCoverage;

/**
 * Class AbstractCodeCoverageReporter
 * @package Peridot\CodeCoverage\Reporter
 */
abstract class AbstractCodeCoverageReporter extends AbstractBaseReporter
{
    /**
     * @var \PHP_CodeCoverage
     */
    protected $coverage;

    /**
     * @var mixed
     */
    protected $coverageReporter;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->coverage = new PHP_CodeCoverage();

        $this->eventEmitter->on('runner.start', function() {
            $this->coverage->start('code-coverage');
        });

        $this->eventEmitter->on('runner.end', function() {
            $this->coverage->stop();

            $this->getCoverageReporter()->process($this->coverage, $this->getReportPath());
        });
    }

    /**
     * Return the code coverage reporter.
     *
     * @return mixed
     */
    public function getCoverageReporter()
    {
        if (!$this->coverageReporter) {
            $this->coverageReporter = $this->createCoverageReporter();
        }

        return $this->coverageReporter;
    }

    /**
     * Return the desired code coverage report path.
     *
     * @return string
     */
    abstract public function getReportPath();

    /**
     * Create the desired code coverage reporter.
     *
     * @return mixed
     */
    abstract protected function createCoverageReporter();
}
